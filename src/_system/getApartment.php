<?php 
    require_once('TestPhp.php');
    $apartment_id = $_POST['apartment_id'];

    $result = getApartment($apartment_id, $mysqli);
    echo json_encode($result);
?>