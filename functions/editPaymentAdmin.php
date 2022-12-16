<?php
$server_name = 'localhost';
$username = 'root';
$password = '';
$db_name = 'elektronikostaisykla';

$cnn = new mysqli($server_name, $username, $password, $db_name);


if (isset($_POST['editPaymentBtn'])) {
    $id = $_POST['payment_id_edit'];
    $paySum = $_POST['editPaymentTotalSum'];
    $payStatus = $_POST['editPaymentStatus'];
    $payDate = $_POST['editPaymentDate'];
    $query = "UPDATE payments SET payments.total_amount_to_pay='$paySum', payments.payment_date='$payDate', payments.is_paid='$payStatus' WHERE payments.payment_id='$id' ";

    mysqli_query($cnn, $query);


    header('location: ../adminPayments.php');
}
