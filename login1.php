<?php
if(isset($_POST['login'])){
    $user_name = $_POST['username'];
    $password = $_POST['password'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" method="post">

<label for="">username:</label><br>
<input type="text" name="username">
<br>
<label for="">password:</label><br>
<input type="text" name="password">
<br>
<button type="submit" name="login">login</button>
</form>
    
</body>
</html>