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

    $query = "UPDATE technicians 
    SET techn_name='$techn_name', techn_email='$techn_email', techn_phone_num='$techn_phone_num', techn_spec_id='$techn_spec' 
    WHERE techn_id='$id' ";

    $execute_query = mysqli_query($cnn, $query);

    if($execute_query) {
        header('location: ../specialistai.php');
    }
}

if(isset($_POST['employeeSettingsSave'])) {
    
    $id2= $_POST['employeeSettingsId'];
    $techn_name2 = $_POST['employeeSettingsName'];
    session_start();
    $_SESSION['user']['name'] = $techn_name2;
    $techn_email2=$_POST['employeeSettingsEmail'];
    $_SESSION['user']['email']=$techn_email2;
    $techn_phone_num2 = $_POST['employeeSettingsTelNr'];
    $_SESSION['user']['phone']=$techn_phone_num2;
    $techn_spec2 = $_POST['employeeSettingsSpecializ'];
    
    $query2 = "UPDATE technicians 
    SET techn_name='$techn_name2', techn_email='$techn_email2', techn_phone_num='$techn_phone_num2', techn_spec_id='$techn_spec2' 
    WHERE user_techn_id='$id2' ";

    $execute_query2 = mysqli_query($cnn, $query2);
    $query3 = "UPDATE users SET name='$techn_name2', email='$techn_email2', phone='$techn_phone_num2' WHERE id='$id2'";
    $execute_query3=mysqli_query($cnn, $query3);
    if($execute_query3) {
        header('location: ../employeePage.php');
        
    }
    
}
?>
