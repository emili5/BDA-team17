<?php
    require_once "config.php";

    header('Content-Type: text/html; charset=utf-8');


    if($_SERVER["REQUEST_METHOD"] == "GET") {

        $status = false;
        $vaccineList = [];

        $hospitalId = $_GET['id'];

        if (isset($_SESSION['userID'])){
            $userID = $_SESSION['userID'];
            $dibsSql = "SELECT * FROM dibs WHERE hospitalId='$hospitalId' AND userId='$userID'";
            $res = mysqli_query($mysqli, $dibsSql);
            if (mysqli_num_rows($res)!=0) {
                $status = true;
            }
        }

        $hospitalSql = "SELECT hospital.id, hospital.name, hospital.phoneNumber, hospital.url, locationdetail.addr, location.x, location.y, hospital.kindnessAvg, hospital.speedAvg, hospital.cleanlinessAvg
                            FROM hospital
                                JOIN locationdetail
                                    ON locationdetail.id = hospital.locationId
                                JOIN location
                                    ON locationdetail.locationId = location.id
                            WHERE hospital.id='$hospitalId'";
        $hospitalRes = mysqli_query($mysqli, $hospitalSql);
        $hospitalInfo = mysqli_fetch_assoc($hospitalRes);

        $sql = "SELECT vaccine.id, vaccine.name, price.cost 
                    FROM price 
                        JOIN vaccine 
                            ON vaccine.id = price.vaccineId 
                    WHERE hospitalId='$hospitalId'";
        $res = mysqli_query($mysqli, $sql);

        while ($row = mysqli_fetch_assoc($res)) {

            array_push($vaccineList, $row);

        }

//        echo json_encode(
//            array(
//                'dibs-status' => $status,
//                'hospital-info' => $hospitalInfo,
//                'hospital-vaccine' => $vaccineList,
//            )
//        );
    }
?>