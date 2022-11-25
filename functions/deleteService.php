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

if (isset($_POST['deleteServiceBtn'])) {
    $id = $_POST['service_id_remove'];

    $query = "DELETE FROM services WHERE service_id='$id' "; 

    $execute_query = mysqli_query($cnn, $query);

    if($execute_query) {
        header('location: ../services.php');
    }
}

?>
