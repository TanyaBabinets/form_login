
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            font-size: 24px;
            text-align: center ;
            flex-direction: column;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: bisque;
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
        h2{
            text-align: center;
            color: forestgreen;
        }
    </style >
</head>
<body>
<h2>Show all users</h2>

<?php
$file='users.txt';
if(file_exists($file)&&filesize($file)>0){
    echo "<table border='1'>";
    echo "<tr><th>Login</th><th>Password</th><th>Email</th></tr>";
$lines=file($file, FILE_IGNORE_NEW_LINES);
foreach($lines as $line){
    $user=explode(':',$line);
    echo "<tr>";
    foreach($user as $data){
        echo "<td>".$data."</td>";
//         echo "<td>" . htmlspecialchars($data) . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
}else{
    echo "<p>No users available</p>";
}

?>
<p><a href="index.php" class="btn">Back</a></p>
</body>
</html>