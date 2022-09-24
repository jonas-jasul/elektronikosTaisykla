<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'elektronikostaisykla');

$email = "";
$phone = "";
$name = "";
$errors = array();

if (isset($_POST['register-btn'])) {
    register();
}

function register()
{
    global $db, $errors, $email, $phone, $name;
    $email = e($_POST['email']);
    $phone = e($_POST['phone']);
    $name = e($_POST['name']);
    $password_1 = e($_POST['password_1']);
    $password_2 = e($_POST['password_2']);


    if (empty($email)) {
        array_push($errors, "El. paštas yra privalomas!");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "Slaptažodžiai nesutampa!");
    }

    if (count($errors) == 0) {
        $password = md5($password_1);
        // if (isset($_POST['user_type'])) {
        //     $user_type = e($_POST['user_type']);
        //     $query = "INSERT INTO users (email, user_type, phone, name, password)
        //         VALUES('$email', '$user_type', '$phone', '$name', '$password')";
        //     mysqli_query($db, $query);
        //     $_SESSION['success'] = "Naujas darbuotojas sukurtas sėkmingai";
        //     header('location: userPage.php');
        // } else {
        $user_type = e($_POST['user_type']);
        $query = "INSERT INTO users (email, user_type, phone, name, password)
                VALUES('$email', 'Vartotojas', '$phone', '$name', '$password')";
        mysqli_query($db, $query);

        $logged_in_user_id = mysqli_insert_id($db);

        $_SESSION['user'] = getUserById($logged_in_user_id);
        $_SESSION['success'] = "Jūs sėkmingai prisijungėte!";
        header('location: userPage.php');
    }
}

function getUserById($id)
{
    global $db;
    $query = "SELECT * FROM users WHERE id=" . $id;
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);
    return $user;
}

function e($val)
{
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}

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

function isLoggedIn()
{
    if (isset($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header('location:login.php');
}

if (isset($_POST['login-btn'])) {
    login();
}

function login()
{
    global $db, $email, $errors;

    $email = e($_POST['email']);
    $password = e($_POST['password']);


    if (count($errors) == 0) {
        $password = md5($password);

        $query = "SELECT * FROM users WHERE email='$email' AND password = '$password' LIMIT 1";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
            $logged_in_user = mysqli_fetch_assoc($results);
            if ($logged_in_user['user_type'] == 'admin') {
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success'] = "Jūs prisijungėte sėkmingai";
                header('location: index.php');
            } else {
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success'] = "Jūs prisijungėte sėkmingai";
                header('location: userPage.php');
            }
        } else {
            array_push($errors, "Netinkamas el. paštas/slaptažodis");
        }
    }
}
