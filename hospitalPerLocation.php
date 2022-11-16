<?php
    require_once "config.php";

    header('Content-Type: text/html; charset=utf-8');

    if(isset($_SESSION["userID"]) == false){
        header("Location: home.php");
        exit();
    }
    else {
        $userID = $_SESSION['userID'];
    }

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $sql = "SELECT locationdetail.gu, COUNT(hospital.locationId)
                    FROM hospital
                             JOIN locationdetail
                                  ON locationdetail.id = hospital.locationId
                             JOIN location
                                  ON locationdetail.locationId = location.id
                    
                    GROUP BY locationdetail.gu
                    ORDER BY locationdetail.gu";
        $res = mysqli_query($mysqli, $sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($res)) {

            array_push($data, $row);

        }

    }
?>
