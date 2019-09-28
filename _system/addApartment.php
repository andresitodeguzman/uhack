<?php
require_once("TestPhp.php");

$apartmentcode = $_POST['apartmentcode'];
$landlord_id = $_POST['landlord_id'];
$tenant_id = $_POST['tenant_id'];

$array = array(
    "apartmentcode"=>$apartmentcode,
    "landlord_id"=>$landlord_id,
    "tenant_id"=>$tenant_id
);

$result = addApartment($array);
echo json_encode($result);
?>