<?php
require_once('TestPhp.php');
$receivable_id = $_POST['receivable_id'];
$newname = $_POST['newname'];
$newrepeat = $_POST['newrepeat'];
$newprice = $_POST['newprice'];

$array = array(
    "receivable_id"=>$receivable_id,
    "newname"=>$newfirst_name,
    "newlastname"=>$newname,
    "newrepeat"=>$newrepeat,
    "newprice"=>$newprice
);

$result = setReceivable($array);
echo json_encode($result);
?>