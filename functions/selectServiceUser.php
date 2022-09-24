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
//---
$phone_service_specializ_id_select = 1;

//nelabai gerai, reikia kaip nors priskirti ID automatiskai
$phone_services = mysqli_query($cnn, "SELECT * FROM services WHERE service_specializ_id='".$phone_service_specializ_id_select."'");

mysqli_close($cnn);