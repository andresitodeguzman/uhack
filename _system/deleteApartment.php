<?php
require_once("TestPhp.php");

$apartment_id = $_POST['apartment_id'];

$result = deleteApartment($apartment_id);
echo json_encode($result);
?>