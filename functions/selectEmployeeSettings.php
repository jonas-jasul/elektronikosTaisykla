<?php 
$server_name = 'localhost';
$username = 'root';
$password= '';
$db_name = 'elektronikostaisykla';

$cnn = new mysqli($server_name, $username, $password, $db_name);

$employeeSettingsId=$_SESSION['user']['id'];

$sql = "SELECT techn_spec_id FROM technicians INNER JOIN users ON technicians.user_techn_id=users.id WHERE user_techn_id='$employeeSettingsId'";

$settings_specializ=mysqli_query($cnn, $sql);
?>