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

//nereikalinga
$table_name = 'technicians';
$columns=['techn_id', 'techn_name', 'techn_email', 'techn_phone_num', 'techn_spec_id', 'user_techn_id'];


$sql = "SELECT * FROM technicians INNER JOIN specializations ON technicians.techn_spec_id=specializations.specializ_id";

$all_technicians= mysqli_query($cnn, $sql);


// $fetch_data = fetch_data($cnn, $table_name, $columns);

// function fetch_data($cnn, $table_name, $columns) {
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
//         $query ="SELECT ".$column_name." FROM $table_name"." INNER JOIN technicians AS specialist on specializations.specializ_id=specialist.techn_spec_id ORDER by specialist.techn_id DESC";
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