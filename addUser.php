<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Add user</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: bisque;
        }
        .form{
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        h1{
            text-align: center;
            color: forestgreen;
        }
        .form label {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        input {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 20px;
            margin-right: 80%;
        }
        p {
            text-align: center;
        }
        button.btn {
            width: 150px;
        }
        .btn {
            background-color: forestgreen;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            width:110px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
    </style>
</head>
<body>
<h1>Register User</h1>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_REQUEST['login']) && isset($_REQUEST['password']) && isset($_REQUEST['email'])) {

        $login = htmlentities($_REQUEST['login']);
        $password = htmlentities($_REQUEST['password']);
        $email = htmlentities($_REQUEST['email']);
        echo "Your login: $login <br> Your password: $password <br> Your email: $email";

        $userData = ['login' => $login,
            'password' => $password,
            'email' => $email];
        $message = AddUser($userData);
        echo "<p>$message</p>";
    } else {
        echo "<p>Please fill all fields</p>";
    }
}

function AddUser($userData)
{
    $file = 'users.txt';
    $lines = file_exists($file) ? file($file, FILE_IGNORE_NEW_LINES) : [];
    foreach ($lines as $line) {
        $parts = explode(':', $line);
        if ($parts[0] == $userData['login']) {
            return "This user already exists.";
        }
    }
    $userRecord = implode(':', $userData) . PHP_EOL;
    file_put_contents($file, $userRecord, FILE_APPEND);
    return "User Added Successfully.";
}?>

<form method="POST" action="addUser.php" >
    <div class="form">
    <label>Login:<input type="text" name="login" required></label><br>
    <label>Password:<input type="password" name="password" required></label><br>
    <label>Email:<input type="email" name="email" required></label><br>
    <button type="submit" class="btn">Register</button>
    </div>
    </form>
<p><a href="index.php" class="btn">Back</a></p>
</body>
</html>
