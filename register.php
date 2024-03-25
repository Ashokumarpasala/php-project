<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Registration-page</title>
</head>
<body>
    <h1>User Registration </h1>
    <form action="process_register.php" method="post">
        <div>
            <label for="name">Username </label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <label for="password_confirm">confrim Password</label>
            <input type="password" id="password_confirm" name="password_confirm">
        </div>
        <input type="submit" value="Register">
    </form>
    <p>Do you have account ? please <a href="login_page.php">Login Here</a></p>
</body>
</html>