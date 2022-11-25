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
$laptop_service_specializ_id_select = 2;
$desktop_service_specializ_id_select = 3;
$console_service_specializ_id_select = 4;
//nelabai gerai, reikia kaip nors priskirti ID automatiskai
$phone_services = mysqli_query($cnn, "SELECT * FROM services WHERE service_specializ_id='".$phone_service_specializ_id_select."'");
$laptop_services = mysqli_query($cnn, "SELECT * FROM services WHERE service_specializ_id='".$laptop_service_specializ_id_select."'");
$desktop_services = mysqli_query($cnn, "SELECT * FROM services WHERE service_specializ_id='".$desktop_service_specializ_id_select."'");
$console_services = mysqli_query($cnn, "SELECT * FROM services WHERE service_specializ_id='".$console_service_specializ_id_select."'");

mysqli_close($cnn);