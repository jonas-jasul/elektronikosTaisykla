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

if (isset($_POST['completeOrderBtn'])) {
    $id = $_POST['order_id_edit'];
    $est_compl_date = $_POST['edittOrderEstComplDate'];
    $techn_id = $_POST['order_edit_techn'];
    $order_description = $_POST['edittOrderDesc'];

    $first = "SELECT `techn_id` FROM technicians WHERE technicians.user_techn_id='$techn_id';";
    $result = mysqli_query($cnn, $first);
    $data1 = mysqli_fetch_row($result);
    $data = $data1[0];
    $query = "UPDATE orders SET orders.order_status='Pabaigtas', orders.order_complet_date_est='$est_compl_date', orders.order_techn_id='$data' WHERE order_id='$id' ";

    mysqli_query($cnn, $query);

    $query2 = "UPDATE order_detaliz SET order_detaliz.order_descrip='$order_description' WHERE order_id='$id' ";

    mysqli_query($cnn, $query2);

    header('location: ../employeePage.php');
}

if(isset($_POST['editOrderBtn'])) {

    
}
?>

