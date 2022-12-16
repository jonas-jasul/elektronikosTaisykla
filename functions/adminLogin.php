<?php
session_start();
$server_name = 'localhost';
$username = 'root';
$password = '';
$db_name = 'elektronikostaisykla';

$cnn = new PDO( "mysql:host=$server_name; dbname=$db_name", $username, $password);
$errors = array();
function display_error()
{
    global $errors;

    if (count($errors) > 0) {
        echo '<div class="error">';
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
        echo '</div>';
    }
}


if (isset($_POST['admin-login-btn'])) {
    $adminEmail = $_POST['adminEmail'];
    $adminPass= $_POST['adminPassword'];
    $query="SELECT * FROM admin_login";
    $stmt=$cnn->prepare($query);
    $stmt->execute();
    $admin=$stmt->fetchAll();

    foreach ($admin as $admin) {
        if(($admin['adminEmail']==$adminEmail) && ($admin['adminPassword']==$adminPass)) {
            $_SESSION['admin']=TRUE;
            header("location: ./");
        }
    }
}
?>
