<?php
    session_start();

    unset($_SESSION['SignedIN']);
    session_destroy();
    header('Location: login.php');
    exit();
?>