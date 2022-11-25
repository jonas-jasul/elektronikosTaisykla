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

if (isset($_POST['updateTechnBtn'])) {
    $id = $_POST['techn_id_edit'];

    $techn_name = $_POST['techn_name_edit'];
    $techn_email = $_POST['techn_email_edit'];
    $techn_phone_num = $_POST['techn_phone_num_edit'];
    $techn_spec = $_POST['techn_spec_edit'];

    $query = "UPDATE technicians SET techn_name='$techn_name', techn_email='$techn_email', techn_phone_num='$techn_phone_num', techn_spec_id='$techn_spec' WHERE techn_id='$id' ";

    $execute_query = mysqli_query($cnn, $query);

    if($execute_query) {
        header('location: ../specialistai.php');
    }
}
?>
// mysqli_close($cnn);
