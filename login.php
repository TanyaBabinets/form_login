<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Login</h2>

<?php
function checkUser($login, $password) {
    $file='users.txt';

    if(!file_exists($file)) {
        return "No users available";
}
    $lines=file($file, FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        $parts = explode(':', $line);
        if ($parts[0] == $login) {
            if (password_verify($password, $parts[1])) {
                return "Login successful";
            }
        }
    }
    return "User not found";
    }
if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $login = htmlentities($_REQUEST['login']);
        $password = ($_REQUEST['password']);
     $message = checkUser($login, $password);
    header("Location: index.php");
    exit();
     echo $message;}
?>
<form method="POST" action="login.php" >
    <div class="form">
        <label>Login:<input type="text" name="login" required></label><br>
        <label>Password:<input type="password" name="password" required></label><br>

        <button type="submit" class="btn">Enter</button>
    </div>
</form>
<p><a href="index.php" class="btn">Back</a></p>
</body>
</html>

