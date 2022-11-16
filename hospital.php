<?php
    include "component/header.php";
    require_once "hospitalInfo.php";

    if($_SERVER["REQUEST_METHOD"] == "GET") {

        $hospitalId = $_GET['id'];

    }
?>

<!DOCTYPE html>
<meta charset="UTF-8"/>
<html>
    <head>

    </head>
    <body>
        <div class="ocean">
            <div class="wave"></div>
            <div class="wave"></div>
        </div>
        <div class="content">
            <div class="centered">
                <div class="box" style="float:left;">
                    <div>
                        <span><?php echo $hospitalInfo["name"];?></span>
                    </div>

                    <div>
                        <span><?php echo $hospitalInfo["phoneNumber"];?></span>
                        <span><?php echo $hospitalInfo["url"];?></span>
                        <span><?php echo $hospitalInfo["addr"];?></span>
                    </div>

                    <div>
                        <span><?php echo $hospitalInfo["kindnessAvg"];?></span>
                        <span><?php echo $hospitalInfo["speedAvg"];?></span>
                        <span><?php echo $hospitalInfo["cleanlinessAvg"];?></span>
                    </div>
                </div>
                <div class="box" style="float:right;">
                    <ul class="vaccine">
                        <?php

//                        var_dump($vaccineList);
                        for($i=0; $i<count($vaccineList); $i=$i+1){
                            $id = $vaccineList[$i]["id"];
                            $name = $vaccineList[$i]["name"];
                            $url = "searchResult.php?id=".urlencode($id);
                            echo "<li><a href='$url'>Hospital Name</a></li>";
                            echo $vaccineList[$i]["cost"];
                        }
                        ?>
                    </ul>
                </div>
                <div>
                    <?php
                        $reviewFormurl = "reviewForm.php?id=".urlencode($hospitalId);
                        $reviewListurl = "review.php?id=".urlencode($hospitalId);
                        echo "<a href='$reviewFormurl'>Write Review</a>";
                        echo "<a href='$reviewListurl'>Review List</a>";
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>