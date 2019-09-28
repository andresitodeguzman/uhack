<?php
require_once("TestPhp.php");

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$contactnumber = $_POST['contactnumber'];
$username = $_POST['username'];
$password = $_POST['password'];

$array = array(
    "firstname"=>$first_name,
    "lastname"=>$last_name,
    "contactnumber"=>$contactnumber,
    "username"=>$username,
    "password"=>$password,
);

$result = addLandlord($array, $mysqli);
echo json_encode($result);
?>