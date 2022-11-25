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

$sql = "SELECT `orders`.`order_id`, `orders`.`order_code`, `orders`.`order_request_date`, `orders`.`order_status`, `orders`.`order_complet_date_est`, `order_detaliz`.`order_item_manufact`, `order_detaliz`.`order_item_model`, `order_detaliz`.`order_amount_to_pay`, `services`.`service_name`, `specializations`.`specializ_name`, `users`.`name`, `technicians`.`techn_name`
FROM `orders` 
	LEFT JOIN `order_detaliz` ON `order_detaliz`.`order_id` = `orders`.`order_id` 
	LEFT JOIN `services` ON `orders`.`order_service_id` = `services`.`service_id` 
	LEFT JOIN `specializations` ON `services`.`service_specializ_id` = `specializations`.`specializ_id` 
	LEFT JOIN `users` ON `orders`.`order_user_id` = `users`.`id` 
	LEFT JOIN `technicians` ON `orders`.`order_techn_id` = `technicians`.`techn_id`";

$all_admin_orders= mysqli_query($cnn, $sql);
