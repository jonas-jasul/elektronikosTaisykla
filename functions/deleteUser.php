<?php
$server_name = 'localhost';
$username = 'root';
$password = '';
$db_name = 'elektronikostaisykla';

$cnn = new mysqli($server_name, $username, $password, $db_name);


if (isset($_POST['deleteUserBtn'])) {
    $id = $_POST['user_id_remove'];

    $query = "DELETE FROM users WHERE id='$id'"; 

    $execute_query = mysqli_query($cnn, $query);

    if($execute_query) {
        header('location: ../adminUsers.php');
    }
}

?>
