<?php
    if(isset($_SESSION["userID"]) == false){
        header("Location: home.php");
        exit();
    }

    $_SESSION = array();

    unset($_SESSION['userID']);
    session_destroy();

    header("Location: home.php");
    exit();
?>
