<?php
    require_once "config.php";

    $categoryInfo = $vaccineInfo = [];


    $sql = "SELECT name FROM category";
    $res = mysqli_query($mysqli, $sql);

    while ($row = mysqli_fetch_assoc($res)) {

        array_push($categoryInfo, $row);

    }

    $sql = "SELECT category.name AS category, vaccine.name AS vaccine FROM category JOIN vaccine ON vaccine.categoryId = category.id ORDER BY category";
    $res = mysqli_query($mysqli, $sql);

    while ($row = mysqli_fetch_assoc($res)) {

        array_push($vaccineInfo, $row);

    }

//    var_dump($categoryInfo);
//    var_dump($vaccineInfo);

    //	mysqli_close($mysqli);
?>
