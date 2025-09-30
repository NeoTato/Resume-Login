<?php

session_start();

$connection = pg_connect("host=localhost port=5432 dbname=resumedb user=postgres password=eonpassword");
if (!$connection) {
        die( "PostgreSQL connection failed." . pg_last_error());
    }

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    if ($username === "eonbusque" && $password === "1234") {
        $_SESSION["username"] = $username; 
        header("Location: resume.php"); 
        exit;
    } else {
        $error = "Invalid Username or Password";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="assets/css/loginStyles.css">
</head>
<body>
    <div class="container">
        <h2>Welcome Back</h2>
        <h3> Sign in to view resume</h3>

        <form action="login.php" method="post">
            <label>Username</label>
            <input type="text" name="username" required>
            <br>
            <label>Password</label>
            <input type="password" name="password" required>
            <br>
            <input type="submit" value="Sign In">
        </form>
        
        <p style="color:red;"><?php echo $error; ?></p>

    </div>
</body>
</html>
