<?php
$server_name = 'localhost';
$username = 'root';
$password = '';
$db_name = 'elektronikostaisykla';

$cnn = new mysqli($server_name, $username, $password, $db_name);

// if ($cnn->connect_error) {
//     die("Klaida!: "
//         . $cnn->connect_error);
// }

if (isset($_POST['acceptOrderBtn'])) {
    $id = $_POST['order_id_accept'];
    $est_compl_date = $_POST['acceptOrderEstComplDate'];
    $order_accept_techn = $_POST['order_accept_techn'];
    // $service_name = $_POST['service_name_edit'];
    // $service_spec = $_POST['service_spec_edit'];
    // $service_desc = $_POST['service_desc_edit'];
    // $service_price = $_POST['servicePriceEdit'];
    $techn_id = $_POST['order_accept_techn'];
    $order_description = $_POST['acceptOrderDesc'];

    $first = "SELECT `techn_id` FROM technicians WHERE technicians.user_techn_id='$techn_id';";
    $result = mysqli_query($cnn, $first);
    $data1 = mysqli_fetch_row($result);
    $data = $data1[0];
    $query = "UPDATE orders SET orders.order_status='Aktyvus', orders.order_complet_date_est='$est_compl_date', orders.order_techn_id='$data' WHERE order_id='$id' ";

    mysqli_query($cnn, $query);

    $query2 = "UPDATE order_detaliz SET order_detaliz.order_descrip='$order_description' WHERE order_id='$id' ";

    mysqli_query($cnn, $query2);

    header('location: ../employeePage.php');
}
?>
// mysqli_close($cnn);