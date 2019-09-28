<?php
require_once("TestPhp.php");

$name = $_POST['first_name'];
$repeat = $_POST['repeat'];
$price = $_POST['price'];

$array = array(
    "firstname"=>$first_name,
    "repeat"=>$repeat,
    "price"=>$price
);

$result = addReceivable($array, $mysqli);
echo json_encode($result);
?>