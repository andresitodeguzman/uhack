<?php 
    require_once('TestPhp.php');
    $tenant_id = $_POST['tenant_id'];

    $result = getTenant($tenant_id, $mysqli);
    echo json_encode($result);
?>