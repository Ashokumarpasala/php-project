<?php



if (empty($_POST["name"])) {
    die("User Name is Requried");
}

if (empty($_POST["email"])) {
    # code...
    die("Please Enter Email Adress.");
}
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Enter valid email adress");
}

if (strlen($_POST["password"]) < 5 ) {
    # code...
    die("Must the password lenght id above 5 chars.");
}

if (preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must have a-z to letters.");
}

if (preg_match("[0-9]", $_POST["password"])) {
    die("password must contain 0-9 any numbers");
}

if ($_POST["password"] !== $_POST["password_confirm"]) {
    # code...
    die("password Not Matched...");
}

$new_hash_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

$conn = require __DIR__. "/database.php";

$data_insert = "INSERT INTO users (name, email, new_hash_password)
                VALUES (?, ?, ?)";

// intizize the stmt 
$stmt_connect = $conn->stmt_init();

if (! $stmt_connect->prepare($data_insert)) {
    # code...
    die("SQL error : $conn->error");
}

$stmt_connect->bind_param("sss", $_POST["name"], $_POST["email"], $new_hash_password);
if ($stmt_connect->execute()) {
    # code...
    // echo "Regiration Success";
    header("Location: login_page.php");
} else {
    if ($conn->errno === 1062) {
        # code...
        echo "email Already taaken";
    } else {
        # code...
        die("$conn->errno");
    }
    
}

// print_r($_POST);
// echo $new_hash_password;
