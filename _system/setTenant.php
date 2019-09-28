<?php
require_once('TestPhp.php');

$tenant_id = $_POST['tenant_id'];
$newfirst_name = $_POST['newfirst_name'];
$newlast_name = $_POST['newlast_name'];
$newcontactnumber = $_POST['newcontactnumber'];
$newusername = $_POST['newusername'];
$newpassword = $_POST['newpassword'];

$array = array(
    "newfirstname"=>$newfirst_name,
    "newlastname"=>$newlast_name,
    "newcontactnumber"=>$newcontactnumber,
    "newusername"=>$newusername,
    "newpassword"=>$newpassword,
);

$result = setTenant($array);
echo json_encode($result);
?>