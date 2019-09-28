<?php 
require_once('TestPhp.php');
$landlord_id = $_POST['landlord_id'];
$newfirst_name = $_POST['newfirst_name'];
$newlast_name = $_POST['newlast_name'];
$newcontactnumber = $_POST['newcontactnumber'];
$newusername = $_POST['newusername'];
$newpassword = $_POST['newpassword'];

$array = array(
    "landlord_id"=>$landlord_id,
    "newfirstname"=>$newfirst_name,
    "newlastname"=>$newlast_name,
    "newcontactnumber"=>$newcontactnumber,
    "newusername"=>$newusername,
    "newpassword"=>$newpassword,
);

$result = setLandlord($array);
echo json_encode($result);
?>