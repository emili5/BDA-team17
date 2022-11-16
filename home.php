<?php
    require_once "component/header.php";

    require_once "rankByRate.php";
    require_once "hospitalPerLocation.php";
    require_once "userInfo.php";
    require_once "vaccineInfo.php";

    $sql = "SELECT gu FROM locationdetail WHERE addr='".$userInfo["addr"]."'";
    $res = mysqli_query($mysqli, $sql);
    $gu = mysqli_fetch_assoc($res)["gu"];
?>

<!DOCTYPE html>
<meta charset="UTF-8"/>
<html>
    <head>
        <style>

        </style>
    </head>
    <body>
        <div>
            <?php
                for($i=0; $i<count($kindnessAvgHosp); $i=$i+1){
                    echo "<span>".$kindnessAvgHosp[$i]["name"]."</span>";
                }
            ?>
        </div>
        <div>
            <?php
                for($i=0; $i<count($speedAvgHosp); $i=$i+1){
                    echo "<span>".$speedAvgHosp[$i]["name"]."</span>";
                }
            ?>
        </div>
        <div>
            <?php
            for($i=0; $i<count($cleanlinessAvgHosp); $i=$i+1){
                echo "<span>".$cleanlinessAvgHosp[$i]["name"]."</span>";
            }
            ?>
        </div>
        <div>
            <span>
                <?php
                    echo $userInfo["addr"];
                ?>
            </span>
        </div>
        <div>
            <span>
                <?php
                for($i=0; $i<count($data); $i=$i+1){
                    if ($data[$i]["gu"]==$gu){
                        $locationCnt = $data[$i]["cnt"];
                    }
                    if ($data[$i]["gu"]==NULL){
                        $totalCnt = $data[$i]["cnt"];
                    }
                }
                echo "$locationCnt";
                ?>
            </span>
            <span>
                <?php
                echo "$totalCnt";
                ?>
            </span>
        </div>
<!--        <select>-->
<!--            --><?php
//                for($i=0; $i<count($categoryInfo); $i=$i+1){
//                    echo "<option value=".$categoryInfo[$i]["name"].">".$categoryInfo[$i]["name"]."</option>";
//                    $crt_category = $categoryInfo[$i]["name"];
//                }
//            ?>
<!--        </select>-->
<!--        <select>-->
<!--            --><?php
//                for($i=0; $i<count($vaccineInfo); $i=$i+1){
//                    if ($vaccineInfo[$i]["category"]==$crt_category){
//                        echo "<option value=".$vaccineInfo[$i]["vaccine"].">".$vaccineInfo[$i]["vaccine"]."</option>";
//                    }
//                }
//            ?>
<!--        </select>-->
    </body>
</html>