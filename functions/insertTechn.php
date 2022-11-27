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

$techn_id = $_GET['techn_id'];
$techn_name = $_GET['techn_name'];
$techn_email = $_GET['techn_email'];
$techn_phone_num = $_GET['techn_phone_num'];
$techn_spec = $_GET['techn_spec_id'];
$techn_pass = $_GET['techn_reg_passw'];

$techn_pass_hsh=password_hash($techn_pass, PASSWORD_DEFAULT);
$query2 = "INSERT INTO users VALUES('$techn_id', '$techn_email', 'Darbuotojas', '$techn_phone_num', '$techn_name', '$techn_pass_hsh')";
mysqli_query($cnn, $query2);
$lastid=mysqli_insert_id($cnn);
$query1 = "INSERT INTO technicians VALUES (NULL, '$techn_name', '$techn_email', '$techn_phone_num', '$techn_spec', '$lastid')";
mysqli_query($cnn, $query1);
header('location: ../specialistai.php');




mysqli_close($cnn);