<?php
    session_start();
    require_once("TestPhp.php");

    if (isset($_SESSION['SignedIN'])){
        header('Location: hidden.php');
        exit();
    }

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $mysqli->real_escape_string($_POST['username']);
        $password = md5($mysqli->real_escape_string($_POST['password']));

        $data = $mysqli->query("SELECT id FROM tenants WHERE username='$username' AND `password`='$password'");
        if ($data->num_rows > 0){
            echo($data);
            $_SESSION['SignedIN'] = '1';
            $_SESSION['Username'] = $username;
            
        }else {
            exit('failed');
        }
    }else{
        echo "No username or Password!";
    }

    

?>