<?php
session_start();
$databaseHost = 'localhost';
$databaseName = 'admiral_2020_zadatak';
$databaseUsername = 'admiral';
$databasePassword = 'baza';

$mysqli = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName) or die(mysqli_error($mysqli));

if(isset($_POST['save'])){
    $name = test_input($_POST['name']);
    $serial = test_input($_POST['serial_number']);
    $gametype = test_input($_POST['game_type_id']);
    $enddate = date("Y-m-d", strtotime($_GET['end_of_guarantee_date']));
    $mysqli->query("INSERT INTO game_machines (name, serial_number, end_of_guarantee_date, game_type_id) VALUES('$name', '$serial', '$enddate', '$gametype')") or 
    die($mysqli->error);
    $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg_type'] = "success";
    header("location: index.php");
}



if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM game_machines WHERE id=$id") or 
    die($mysqli->error);
    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";
    header("location: index.php");
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }