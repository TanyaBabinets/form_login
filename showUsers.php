
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Show all users</h2>

<?php
$file='users.txt';
if(file_exists($file)&&filesize($file)>0){
    echo "<table border='1'>";
    echo "<tr><th>Login</th><th>Email</th></tr>";
$lines=file($file, FILE_IGNORE_NEW_LINES);
foreach($lines as $line){
    $user=explode(':',$line);
    if(count($user)===3) { //3 elememts in massive user
        $login=$user[0];
        $email=$user[2];// чтоб не выводить пароль на страницу
        echo "<tr><td>".$login."</td><td>".$email."</td></tr>";
    }
//    echo "<tr>";
//    foreach($user as $data){
//        echo "<td>".$data."</td>";
//    }
   // echo "</tr>";
}
echo "</table>";
}else{
    echo "<p>No users available</p>";
}

?>
<p><a href="index.php" class="btn">Back</a></p>
</body>
</html>