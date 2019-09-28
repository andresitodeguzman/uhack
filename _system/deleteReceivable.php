<?php
require_once("TestPhp.php");

$receivable_id = $_POST['receivable_id'];

$result = deleteReceivable($receivable_id);
echo json_encode($result);
?>