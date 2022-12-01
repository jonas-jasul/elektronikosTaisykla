<?php
$server_name = 'localhost';
$username = 'root';
$password = '';
$db_name = 'elektronikostaisykla';

$cnn = new mysqli($server_name, $username, $password, $db_name);

if ($cnn->connect_error) {
    die("Klaida!: "
        . $cnn->connect_error);
}
// $table_name = 'technicians';
// $columns=['techn_id', 'techn_name', 'techn_email', 'techn_phone_num', 'techn_spec_id', 'user_techn_id'];
//include_once('functions/pagination.php');

//$sql = "SELECT * FROM orders INNER JOIN specializations ON technicians.techn_spec_id=specializations.specializ_id";
//$ord_usr_id=$_SESSION['user']['id'];
// SQL INJECTION!!!!

if (isset($_GET['pageNr'])) {

    $pageNr = $_GET['pageNr'];
} else {
    $pageNr = 1;
}

$records_per_page = 7;
$offset = ($pageNr - 1) * $records_per_page;

$total_pages_query = "SELECT COUNT(*) FROM orders WHERE orders.order_status='Neaktyvus'";

$result = mysqli_query($cnn, $total_pages_query);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $records_per_page);

//Aternative 
// $sql1 = "SELECT * FROM orders INNER JOIN services ON orders.order_service_id=services.service_id 
// INNER JOIN order_detaliz ON orders.order_id=order_detaliz.order_id 
// INNER JOIN users ON orders.order_user_id=users.id WHERE orders.order_status='Neaktyvus' LIMIT $offset, $records_per_page";

$employeeSettingsId=$_SESSION['user']['id'];

$sql = "SELECT techn_spec_id FROM technicians INNER JOIN users ON technicians.user_techn_id=users.id WHERE user_techn_id='$employeeSettingsId'";

$settings_specializ=mysqli_query($cnn, $sql);

while ($row = $settings_specializ->fetch_assoc()) {
    $loggedInEmployeeSpec = $row['techn_spec_id'];
}
$sql1 = "SELECT * FROM orders INNER JOIN services ON orders.order_service_id=services.service_id 
INNER JOIN order_detaliz ON orders.order_id=order_detaliz.order_id 
INNER JOIN users ON orders.order_user_id=users.id WHERE orders.order_status='Neaktyvus' AND services.service_specializ_id='$loggedInEmployeeSpec'";
$all_inactive_techn_orders = mysqli_query($cnn, $sql1);

$techn_id = $_SESSION['user']['id'];

$first = "SELECT `techn_id` FROM technicians WHERE technicians.user_techn_id='$techn_id';";
$result = mysqli_query($cnn, $first);
$data1 = mysqli_fetch_row($result);
$data = $data1[0];



$sql2 = "SELECT * FROM orders LEFT JOIN services ON orders.order_service_id=services.service_id LEFT JOIN payments on orders.order_id=payments.order_id LEFT JOIN order_detaliz ON orders.order_id=order_detaliz.order_id LEFT JOIN users ON orders.order_user_id=users.id WHERE orders.order_status='Aktyvus' AND order_techn_id='$data'";
$all_active_techn_orders = mysqli_query($cnn, $sql2);
