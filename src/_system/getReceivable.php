<?php
    require_once('TestPhp.php');
    $receivable_id = $_POST['receivable_id'];

    $result = getReceivable($receivable_id, $mysqli);
    echo json_encode($result);    
?>