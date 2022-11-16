<?php
    require_once "config.php";

    if(isset($_SESSION["userID"]) == false){
        header("Location: home.php");
        exit();
    }

    $userID = $_SESSION["userID"];
    $sql = "DELETE FROM user WHERE id = '$userID'";
    $res = mysqli_query($mysqli, $sql);

    if($res){
        $_SESSION = array();

        unset($_SESSION['userID']);
        session_destroy();

        header("Location: home.php");
    }
    else{
        echo 'error';
    }
    mysqli_close($mysqli);
?>