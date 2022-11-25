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
//$ord_usr_id=$_SESSION['user']['id'];
// SQL INJECTION!!!!
$sql1 = "SELECT * FROM orders INNER JOIN services ON orders.order_service_id=services.service_id INNER JOIN order_detaliz ON orders.order_id=order_detaliz.order_id INNER JOIN users ON orders.order_user_id=users.id WHERE orders.order_status='Neaktyvus'";
$all_inactive_techn_orders= mysqli_query($cnn, $sql1);

$techn_id= $_SESSION['user']['id'];

$first = "SELECT `techn_id` FROM technicians WHERE technicians.user_techn_id='$techn_id';";
$result=mysqli_query($cnn,$first);
$data1=mysqli_fetch_row($result);
$data = $data1[0];



$sql2 = "SELECT * FROM orders INNER JOIN services ON orders.order_service_id=services.service_id INNER JOIN order_detaliz ON orders.order_id=order_detaliz.order_id INNER JOIN users ON orders.order_user_id=users.id WHERE orders.order_status='Aktyvus' AND order_techn_id='$data'";
$all_active_techn_orders = mysqli_query($cnn, $sql2);