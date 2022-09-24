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

if (isset($_POST['deleteTechnBtn'])) {
    $id = $_POST['techn_id_remove'];

    $query = "DELETE FROM technicians WHERE techn_id='$id' "; 

    $execute_query = mysqli_query($cnn, $query);

    if($execute_query) {
        header('location: ../specialistai.php');
    }
}

?>
