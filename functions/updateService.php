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

if (isset($_POST['updateServiceBtn'])) {
    $id = $_POST['service_id_edit'];

    $service_name = $_POST['service_name_edit'];
    $service_spec = $_POST['service_spec_edit'];
    $service_desc = $_POST['service_desc_edit'];

    $query = "UPDATE services SET service_name='$service_name', service_specializ_id='$service_spec', description='$service_desc' WHERE service_id='$id' ";

    $execute_query = mysqli_query($cnn, $query);

    if($execute_query) {
        header('location: ../services.php');
    }
}
?>
// mysqli_close($cnn);
