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

// $order_id = $_POST['order_id'];

$slct=mysqli_query($cnn, "SELECT COALESCE(MAX(order_id), 0) + 1 as max_id FROM orders");
$row=mysqli_fetch_assoc($slct);
$code = $row['max_id'];

//$order_code = "0";
$order_service_id = $_POST['order_service_id'];
$order_user_id = $_POST['order_user_id'];
//$order_techn_id = $_POST['order_techn_id'];
//$order_techn_id = NULL;
$order_status = "Neaktyvus";
$order_complet_date_est="date2test";
$order_item_manufact = $_POST['order_item_manufact'];
$order_item_model = $_POST['order_item_model'];
$order_amount_to_pay=$_POST['order_item_price'];
//$order_item_specializ= $_POST['order_item_specializ'];

$UUIDquery=mysqli_query($cnn, "SELECT UUID_SHORT() as genUUID");
$row2=mysqli_fetch_assoc($UUIDquery);
$generatedUUIDbefore=$row2['genUUID'];
$generatedUUID2= substr($generatedUUIDbefore, 9, 13);
//$generatedUUID2 = mb_strimwidth($generatedUUIDbefore, 7, 6, "");
//$generatedUUID3= implode("-", str_split($generatedUUID2, 4));

$query2 = "INSERT INTO orders VALUES(NULL, $generatedUUID2, CURRENT_TIMESTAMP(), '$order_service_id', '$order_user_id', NULL, '$order_status', '$order_complet_date_est')";
mysqli_query($cnn, $query2);
$lastid=mysqli_insert_id($cnn);
$query1 = "INSERT INTO order_detaliz VALUES (NULL, '$lastid', '$order_item_manufact', '$order_item_model', '$order_amount_to_pay', NULL)";
mysqli_query($cnn, $query1);

$query3= "INSERT INTO payments VALUES (NULL, '$lastid', '0', NULL, NULL)";
mysqli_query($cnn, $query3);
header('location: ../userPage.php');




mysqli_close($cnn);