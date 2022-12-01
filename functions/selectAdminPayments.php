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



$sql = "SELECT * FROM payments
	LEFT JOIN `orders` ON `orders`.`order_id` = `payments`.`order_id`
	LEFT JOIN `order_detaliz` ON `orders`.`order_id` = `order_detaliz`.`order_id`  
	LEFT JOIN `services` ON `orders`.`order_service_id` = `services`.`service_id` 
	LEFT JOIN `specializations` ON `services`.`service_specializ_id` = `specializations`.`specializ_id` 
	LEFT JOIN `users` ON `orders`.`order_user_id` = `users`.`id` 
	LEFT JOIN `technicians` ON `orders`.`order_techn_id` = `technicians`.`techn_id`";

$all_admin_payments= mysqli_query($cnn, $sql);
