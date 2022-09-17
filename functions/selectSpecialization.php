<?php
$server_name = 'localhost';
$username = 'root';
$password= '';
$db_name = 'elektronikostaisykla';

$cnn = mysqli_connect($server_name, $username, $password, $db_name);

$sql = "SELECT * FROM specializations";

$all_specializations = mysqli_query($cnn, $sql);