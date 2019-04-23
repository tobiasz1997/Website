<?php

session_start();

if(!isset($_SESSION['online'])){
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Grzegorz Tobiasz</title>
    <link rel="stylesheet" type="text/css" media="screen" href="loginAnimation.js">
    <link rel="stylesheet" type="text/css" media="screen" href="loginStyle.css">
</head>
<body>
<?php
    echo 'siema'.$_SESSION['user'].'!';
    echo '<a href="logOut.php">Wyloguj sie!</a>';
?>
</body>
</html>