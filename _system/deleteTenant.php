<?php
require_once("TestPhp.php");

$tenant_id = $_POST['tenant_id'];

$result = deleteTenant($tenant_id);
echo json_encode($result);
?>