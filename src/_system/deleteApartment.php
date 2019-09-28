<?php
require_once("TestPhp.php");

$apartment_id = $_POST['apartment_id'];

$result = deleteApartment($apartment_id, $mysqli);
echo json_encode($result);
?>