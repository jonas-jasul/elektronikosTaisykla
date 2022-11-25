<?php
$server_name = 'localhost';
$username = 'root';
$password= '';
$db_name = 'elektronikostaisykla';

$cnn = new mysqli($server_name, $username, $password, $db_name);

if($cnn->connect_error) {
    die("Klaida!: "
        . $cnn->connect_error);
}


$sql = "SELECT * FROM users WHERE user_type='Vartotojas'";

$all_users= mysqli_query($cnn, $sql);


mysqli_close($cnn);