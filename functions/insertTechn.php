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


$techn_name = $_GET['techn_name'];
$techn_email = $_GET['techn_email'];
$techn_phone_num = $_GET['techn_phone_num'];
$techn_spec = $_GET['techn_spec'];

$query = "INSERT INTO technicians VALUES (NULL, '$techn_name', '$techn_email', '$techn_phone_num', '$techn_spec')";

if(mysqli_query($cnn, $query)) {
    header('location: ../specialistai.php');
}

else {
    echo "Neįkelta";
}

mysqli_close($cnn);