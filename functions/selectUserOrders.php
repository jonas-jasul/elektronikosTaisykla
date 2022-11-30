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

//include_once("functions/pagination.php");

if (isset($_GET['pageNr'])) {

    $pageNr = $_GET['pageNr'];
} else {
    $pageNr =1;
}

$ord_usr_id=$_SESSION['user']['id'];

$records_per_page=7;
$offset = ($pageNr-1)*$records_per_page;

$total_pages_query = "SELECT COUNT(*) FROM orders WHERE orders.order_user_id='$ord_usr_id'";

$result=mysqli_query($cnn, $total_pages_query);
$total_rows=mysqli_fetch_array($result)[0];
$total_pages=ceil($total_rows/$records_per_page);

//$sql = "SELECT * FROM orders INNER JOIN specializations ON technicians.techn_spec_id=specializations.specializ_id";

// SQL INJECTION!!!!
//alternatyti paginacija
// $sql = "SELECT * FROM orders LEFT JOIN services ON orders.order_service_id=services.service_id 
// LEFT JOIN order_detaliz ON orders.order_id=order_detaliz.order_id 
// LEFT JOIN specializations ON services.service_specializ_id=specializations.specializ_id 
// LEFT JOIN technicians ON orders.order_techn_id=technicians.techn_id WHERE orders.order_user_id='$ord_usr_id' LIMIT $offset, $records_per_page";
$sql = "SELECT * FROM orders LEFT JOIN services ON orders.order_service_id=services.service_id 
LEFT JOIN payments ON orders.order_id=payments.order_id
LEFT JOIN order_detaliz ON orders.order_id=order_detaliz.order_id 
LEFT JOIN specializations ON services.service_specializ_id=specializations.specializ_id 
LEFT JOIN technicians ON orders.order_techn_id=technicians.techn_id 

WHERE orders.order_user_id='$ord_usr_id'";
$all_user_orders= mysqli_query($cnn, $sql);
