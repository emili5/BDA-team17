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
        $userSql = "SELECT user.id, user.nickname, user.email, user.age, sex.type, locationdetail.locationId, locationdetail.addr
                        FROM user
                            JOIN locationdetail
                                ON locationdetail.locationId = user.locationId
                            JOIN sex
                                ON sex.id = user.sexId
                        WHERE user.id =$userID;";
        $userRes = mysqli_query($mysqli, $userSql);

        $userInfo = mysqli_fetch_assoc($userRes);
        $userId = $userInfo['id'];

        $dibsSql = "SELECT hospitalId FROM dibs WHERE userId='$userId'";
        $dibsRes = mysqli_query($mysqli, $dibsSql);
        $dibsId = mysqli_fetch_all($dibsRes);

        $dibsList = [];

        for($i=0; $i<count($dibsId); $i=$i+1)
        {
            $hospSql = "SELECT id, name FROM hospital WHERE id='{$dibsId[$i][0]}'";
            $hospRes = mysqli_query($mysqli, $hospSql);
            $hospRes = mysqli_fetch_assoc($hospRes);

            array_push($dibsList, $hospRes);

        }

//        echo json_encode(
//            array(
//                'user-info' => $userInfo,
//                'user-dibs' => $dibsList
//            )
//        );
    }
?>