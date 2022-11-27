<?php
$server_name = 'localhost';
$username = 'root';
$password= '';
$db_name = 'elektronikostaisykla';

$cnn = new mysqli($server_name, $username, $password, $db_name);

if($cnn->connect_error) {
    die("Klaida!: "
        . $cnn->connect_error);
}

if (isset($_GET['pageNr'])) {

    $pageNr = $_GET['pageNr'];
} else {
    $pageNr =1;
}

$records_per_page=7;
$offset = ($pageNr-1)*$records_per_page;

$total_pages_query = "SELECT COUNT(*) FROM users";

$result=mysqli_query($cnn, $total_pages_query);
$total_rows=mysqli_fetch_array($result)[0];
$total_pages=ceil($total_rows/$records_per_page);

//Alternatyvi paginacija
//$sql = "SELECT * FROM users WHERE user_type='Vartotojas' LIMIT $offset, $records_per_page";
$sql = "SELECT * FROM users WHERE user_type='Vartotojas'";

$all_users= mysqli_query($cnn, $sql);


mysqli_close($cnn);