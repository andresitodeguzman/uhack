<?php
require_once("TestPhp.php");

$landlord_id = $_POST['landlord_id'];

$result = deleteLandlord($landlord_id, $mysqli);
echo json_encode($result);
?>