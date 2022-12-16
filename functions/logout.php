
<?php 

$server_name = 'localhost';
$username = 'root';
$password= '';
$db_name = 'elektronikostaisykla';

$cnn = new mysqli($server_name, $username, $password, $db_name);

session_start();
unset($_SESSION);
session_destroy();
header("location: ../login.php");
