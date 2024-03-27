<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit;
}

require_once "database.php"; // Include database connection file

if (isset($_GET['card_temp'])) {
    // Get the selected image URL
    $card_temp = urldecode($_GET['card_temp']);

    // Prepare and execute SQL statement to insert image URL into the database
    $stmt = $conn->prepare("INSERT INTO templates (user_id, image_url) VALUES (?, ?)");
    $stmt->bind_param("is", $_SESSION['user_id'], $card_temp); // Assuming user_id is an integer

    if ($stmt->execute()) {
        echo "Image URL stored successfully in the database.";
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    echo "No image selected.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $groom_name = $_POST['g_name'];
    $groom_age = $_POST['g_age'];
    $bride_name = $_POST['b_name'];
    $bride_age = $_POST['b_age'];

    // Prepare and execute the SQL statement to insert data
    $sql = "INSERT INTO coupletable (user_id, g_name, g_age, b_name, b_age) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("issss", $_SESSION['user_id'], $groom_name, $groom_age, $bride_name, $bride_age);
        if ($stmt->execute()) {
            echo "New record created successfully";    
            header("Location: template.php");        
        } else {
            echo "Error executing SQL statement: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing SQL statement: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Document</title>
    <style>
        .box{
            display: flex;
        }
    </style>
</head>
<body style="font-family: cursive;">
    <div class="box">
        <div>
            <h1 >Enter Couple's Data</h1>
            <form method="post" action="">
                <label for="g_name">Groom's Name:</label>
                <input type="text" name="g_name" id="g_name">
                <label for="g_age">Groom's Age:</label>
                <input type="number" name="g_age" id="g_age">
                <label for="b_name">Bride's Name:</label>
                <input type="text" name="b_name" id="b_name">
                <label for="b_age">Bride's Age:</label>
                <input type="number" name="b_age" id="b_age">
                <button type="submit">Generate PDF</button>
            </form>
        </div>
<div style="margin-left: 100px;">

    
    <?php
    if (isset($_GET['card_temp'])) {
        $card_temp = urldecode($_GET['card_temp']);
    } else {
        $card_temp = ''; // Set a default value if card_temp is not provided
        echo "No image selected";
    }
    
    if (!empty($card_temp)) {
        echo "<img style='width: 350px; border-radius: 15px;' src='$card_temp' alt=''>";
    }
    ?>
    </div>
</div>
</body>
</html>
