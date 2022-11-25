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
// $table_name = 'technicians';
// $columns=['techn_id', 'techn_name', 'techn_email', 'techn_phone_num', 'techn_spec_id', 'user_techn_id'];


//$sql = "SELECT * FROM orders INNER JOIN specializations ON technicians.techn_spec_id=specializations.specializ_id";
$ord_usr_id=$_SESSION['user']['id'];
// SQL INJECTION!!!!
$sql = "SELECT * FROM orders INNER JOIN services ON orders.order_service_id=services.service_id INNER JOIN order_detaliz ON orders.order_id=order_detaliz.order_id INNER JOIN specializations ON services.service_specializ_id=specializations.specializ_id LEFT JOIN technicians ON orders.order_techn_id=technicians.techn_id WHERE orders.order_user_id='$ord_usr_id'";

$all_user_orders= mysqli_query($cnn, $sql);
