<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Add user</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Register User</h1>


<?php
$flagError = false;
$hashedPassword = "";
$regSuccess = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_REQUEST['login']) && isset($_REQUEST['password']) && isset($_REQUEST['Cpassword']) && isset($_REQUEST['email'])) {

        $login = htmlentities($_REQUEST['login']);
        $password = ($_REQUEST['password']);
        $Cpassword = ($_REQUEST['Cpassword']);
        $email = htmlentities($_REQUEST['email']);


        if ($password !== $Cpassword) {
            $flagError = true;

        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        }

        if ($flagError) {
            echo "<p style = 'color:red;'>Password do not match</p>";
}else if($hashedPassword){
            $userData = [
                'login' => $login,
                'password' => $hashedPassword,
                'email' => $email];
            $message = AddUser($userData);
            echo "<p>$message</p>";
            if ($message === "User Added Successfully.") {
                $regSuccess = true;
                $login = "";
                $email = "";//очистка формы если успешно
            }
            }
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
} ?>

<form method="POST" action="addUser.php">
    <div class="form">
        <label>Login:<input type="text" name="login" value="<?php echo isset ($login) ? htmlentities($login) : ''; ?>"
                            required></label><br>
        <label>Password:<input type="password" name="password" required></label><br>
        <label>Confirm Password:<input type="password" name="Cpassword" required></label><br>


        <label>Email:<input type="email" name="email" value="<?php echo isset ($email) ? htmlentities($email) : ''; ?>"
                            required></label><br>
        <button type="submit" class="btn">Register</button>
    </div>
</form>
<p><a href="index.php" class="btn">Back</a></p>
</body>
</html>
