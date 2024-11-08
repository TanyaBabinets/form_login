<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Меню</title>
<style>
    body{
        font-family: Arial, sans-serif;
        font-size: 24px;
        text-align: center ;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(to bottom, #C2B280, #FFF8E1);
    }
    li{
        list-style:none;

    }
    h2{
        text-align: center;
        color: forestgreen;
    }
    </style >
</head>
<body>
<div class="start">
<h2>Make Your Choice</h2>
<ul>
    <li><a href="login.php">Login</a></li>
    <li><a href="addUser.php">Add User</a></li>
    <li><a href="showUsers.php">Show All Users</a></li>
</ul>
<p>Users Quantity:
    <?php
$file='users.txt';
$userCount=file_exists($file)?count(file($file)):0;
echo $userCount;
?>
</p>
</div>
</body>
</html>
