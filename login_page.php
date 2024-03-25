<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Login_page</title>
</head>
<body>
    <?php
    $is_invalid = false;
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // import database connection
        $conn = require __DIR__. '/database.php';
        // writea db query string to get the particulat column of the data base
        $data_insert = sprintf("SELECT * FROM users WHERE email = '%s'", $conn->real_escape_string($_POST["email"]));
        
        $result = $conn->query($data_insert);
        $user = $result->fetch_assoc();
         if ($user) {
            # code...
            if (password_verify($_POST["password"], $user["new_hash_password"])) {
                # code...
                // die("login sucess");
                session_start();

                $_SESSION["user_id"] = $user["id"];
                header("Location: home_page.php");
                exit;
            }
         }

         $is_invalid = true;
        
        // print_r($user);
    }
    ?>
    <h1>User Login Page </h1>
    <?php if ($is_invalid): ?>
        <em>Invalid login details</em>
        <?php endif; ?>
    <form  method="post">

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        <button>Log in</button>
    </form>
        <p>Don't you have any account ? please <a href="register.php">Register Here</a></p>

</body>
</html>