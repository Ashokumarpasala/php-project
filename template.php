<?php
session_start();

// Include database connection file
require_once "database.php"; // Adjust the path as needed

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: login.php");
    exit;
}

// Get the current user's ID from the session
$user_id = $_SESSION['user_id'];

// Fetch the image URL from the database
$sql_image = "SELECT image_url FROM templates ORDER BY id DESC LIMIT 1"; // Assuming 'templates' is your table name
$result_image = $conn->query($sql_image);

if ($result_image && $result_image->num_rows > 0) {
    $row_image = $result_image->fetch_assoc();
    $image_url = $row_image['image_url'];
    // Echo out the image URL to check if it's correct
}

// SQL query to retrieve data for the current user
$sql_user = "SELECT g_name, g_age, b_name, b_age FROM coupletable WHERE id = (SELECT MAX(id) FROM coupletable WHERE user_id = ?)";

// Prepare the SQL statement
$stmt_user = $conn->prepare($sql_user);

// Bind parameters and execute the statement
$stmt_user->bind_param("i", $user_id);
$stmt_user->execute();

// Get the result
$result_user = $stmt_user->get_result();

if ($result_user->num_rows > 0) {
    // Fetch data from the result
    $row_user = $result_user->fetch_assoc();
    $groomName = $row_user["g_name"];
    $groomAge = $row_user["g_age"];
    $brideName = $row_user["b_name"];
    $brideAge = $row_user["b_age"];
} else {
    echo "No results found for User ID: " . $user_id;
}

// Close statement and connection
$stmt_user->close();
// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/gutenberg-css@0.6">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <style>
        * {
            padding: 0;
            margin: 0;
			font-family: cursive;
        }
        .mainimg {
            position: absolute;
            z-index: -1; 
			border-radius: 20px;
			
        }
		.content {
			padding: 150px 100px;
		}
    </style>
</head>
<body class="">
    <div class="container text-white">
        <img class="mainimg shadow-lg " src="<?php echo $image_url ?>" alt="">    
		<div class="content">

			<p style="font-size: 100px;" class="">Marrige Invitation</p>
			
			<div class="fs-3 my-5">
				<p class="fs-1 fw-bold">Dear friends & family members,</p>
				<p class="w-75">
					We joyfully invite you to join us as we embark on a journey of love and togetherness. It is with immense pleasure that we extend this heartfelt invitation to our wedding celebration. <br><br>
					
					Date: [Date of Wedding] <br>
					Time: [Time of Wedding] <br>
					Venue: [Venue Name, Address] <br> <br>
					
					Join us for a celebration filled with love, laughter, and cherished moments. <br><br>
					
					Your presence would mean the world to us as we exchange vows and begin our new life together as partners in love and companionship.</p>
				</div>
				<?php if (isset($groomName)) : ?>
					<div style="font-size: 45px;">
						<p><strong>Groom's Name:</strong> <?php echo $groomName; ?></p>
						<p><strong>Groom's Age:</strong> <?php echo $groomAge; ?></p>
					</div>
						<p class="text-center" style="font-size: 90px;"><strong>wed's</strong></p>
					<div style="font-size: 45px;">
							<p><strong>Bride's Name:</strong> <?php echo $brideName; ?></p>
							<p><strong>Bride's Age:</strong> <?php echo $brideAge; ?></p>
						</div>
					<?php else : ?>
						<p>No data available.</p>
						<?php endif; ?>
				</div>  

    </div>
</body>
</html>
