<?php
$server_name = 'localhost';
$username = 'root';
$password = '';
$db_name = 'elektronikostaisykla';

$cnn = new mysqli($server_name, $username, $password, $db_name);

if (isset($_POST['acceptOrderCancellationBtn'])) {
    $id = $_POST['order_id_cancel'];

    $query = "DELETE FROM orders WHERE order_id='$id' "; 

    $execute_query = mysqli_query($cnn, $query);
    if($execute_query) {
        header('location: ../userPage.php');
    }
}

?>
