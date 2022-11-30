<?php
$server_name = 'localhost';
$username = 'root';
$password = '';
$db_name = 'elektronikostaisykla';

$cnn = new mysqli($server_name, $username, $password, $db_name);


if (isset($_POST['editOrderBtn'])) {
    $id = $_POST['order_id_edit'];
    $set_order_start_date = $_POST['editOrderDate'];
    $est_compl_date = $_POST['editOrderEstComplDate'];
    $techn_id = $_POST['order_edit_techn'];
    $order_description = $_POST['editOrderDesc'];
    $set_techn_id=$_POST['editOrderAdminTechn'];
    $order_status = $_POST['editOrderAdminStatus'];

    $query = "UPDATE orders SET orders.order_complet_date_est='$est_compl_date', orders.order_techn_id='$set_techn_id', orders.order_request_date='$set_order_start_date', orders.order_status='$order_status' WHERE order_id='$id' ";

    mysqli_query($cnn, $query);

    $query2 = "UPDATE order_detaliz SET order_detaliz.order_descrip='$order_description' WHERE order_id='$id' ";

    mysqli_query($cnn, $query2);

    header('location: ../adminOrders.php');
}


?>

