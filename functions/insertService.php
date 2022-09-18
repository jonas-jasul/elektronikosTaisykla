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


$service_name = $_GET['service_name'];
$service_specializ_id = $_GET['service_specializ_id'];
$description = $_GET['description'];

$query = "INSERT INTO services VALUES (NULL, '$service_name', '$service_specializ_id', '$description')";

if(mysqli_query($cnn, $query)) {
    header('location: ../services.php');
}

else {
    echo "Neįkelta";
}

mysqli_close($cnn);