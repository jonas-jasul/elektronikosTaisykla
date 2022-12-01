<?php
$server_name = 'localhost';
$username = 'root';
$password = '';
$db_name = 'elektronikostaisykla';

$cnn = new mysqli($server_name, $username, $password, $db_name);


$paymentId = $_POST['paymentID'];
$paymentSum = $_POST['amountPaid'];
//$paymentDate = $_POST['payment_date'];
mysqli_query($cnn, "UPDATE payments SET is_paid='1', payment_date=CURRENT_TIMESTAMP, total_amount_paid='$paymentSum' WHERE order_id='$paymentId'")

?>