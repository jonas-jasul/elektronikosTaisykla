<?php
$server_name = 'localhost';
$username = 'root';
$password= '';
$db_name = 'elektronikostaisykla';

$cnn = mysqli_connect($server_name, $username, $password, $db_name);

$sql = "SELECT * FROM specializations";

$all_specializations = mysqli_query($cnn, $sql);


// $server_name = 'localhost';
// $username = 'root';
// $password= '';
// $db_name = 'elektronikostaisykla';

// $cnn = new mysqli($server_name, $username, $password, $db_name);

// if($cnn->connect_error) {
//     die("Klaida!: "
//         . $cnn->connect_error);
// }
// $table_name = 'specializations';
// $columns=['specializ_id', 'specializ_name'];

// //$service_specializ_id_select = $_SESSION['userSelectRepairID'];
// //$all_services = mysqli_query($cnn, "SELECT * FROM services WHERE service_specializ_id='".$service_specializ_id_select."'");
// $fetch_data2 = fetch_data2($cnn, $table_name, $columns);
// session_unset();
// function fetch_data2($cnn, $table_name, $columns) {
//     if(empty($cnn)) {
//         $msg = "Duombazės prisijungimo klaida";
//     }
//     elseif (empty($columns) || !is_array($columns)) {
//         $msg = "Stulpelio pavadinimo klaida";
//     }
//     elseif(empty($table_name)) {
//         $msg = "Lentelės pavadinimas tuščias";
//     }
//     else {
//         $column_name = implode(", ", $columns);
//         $query ="SELECT * FROM specializations";
//         //$query ="SELECT ".$column_name." FROM $table_name"." INNER JOIN specializations ON specializations.specializ_id = services.service_specializ_id ORDER by service_id DESC";
//         $result = $cnn->query($query);

//         if($result==true) {
//             if($result->num_rows > 0) {
//                 $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
//                 $msg = $row;
//             }
//             else {
//                 $msg= "Duomenys nerasti";
//             }
//         }
//         else {
//             $msg=mysqli_error($cnn);
//         }
//     }
//     return $msg;
// }

mysqli_close($cnn);