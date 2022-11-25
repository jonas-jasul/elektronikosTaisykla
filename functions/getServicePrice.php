<?php
$server_name = 'localhost';
$username = 'root';
$password= '';
$db_name = 'elektronikostaisykla';

$cnn = new mysqli($server_name, $username, $password, $db_name);

$ref = $_POST['order_service_id'];
$query= mysqli_query($cnn, "SELECT * FROM services WHERE service_id = '$ref'");

$data = array();
while($row=mysqli_fetch_array($query)) {
    $row_data =array(
        'service_id'=>$row['service_id'],
        'price' =>$row['price']
    );
    array_push($data, $row_data);
}

echo json_encode($data);
?>