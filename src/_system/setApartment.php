<?php 
require_once('TestPhp.php');
$apartment_id = $_POST['apartment_id'];
$newapartmentcode = $_POST['newapartmentcode'];
$newlandlord_id = $_POST['newlandlord_id'];
$newtenant_id = $_POST['newtenant_id'];

$array = array(
    "apartment_id"=>$apartment_id,
    "newapartmentcode"=>$newapartmentcode,
    "newlandlord_id"=>$newlandlord_id,
    "newtenant_id"=>$newtenant_id
);

$result = setApartment($array, $mysqli);
echo json_encode($result);
?>