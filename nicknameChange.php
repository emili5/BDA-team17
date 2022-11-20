<?php
    require_once "config.php";
    require_once "component/header.php";
    require_once "userInfo.php";

    if(isset($_SESSION["userID"]) == false){
        header("Location: home.php");
        exit();
    }
    else {
        $userID = $_GET['id'];
        //echo $userID;
    }

    $sql = "SELECT nickname FROM user WHERE id='$userID'";
    $res = mysqli_query($mysqli, $sql);
    $crt_nickname = mysqli_fetch_assoc($res)["nickname"];

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty(trim($_POST["nickname"]))){
            echo '<script>alert("Form needs to be completely filled out")</script>';
        }
        else {
            $new_nickname=$_POST['nickname'];

            if ($crt_nickname == $new_nickname){
                echo '<script>alert("New nickname is same as old one")</script>';
            }
            else {
                $sql="UPDATE user SET nickname='$new_nickname' WHERE id='$userID'";
                $res = mysqli_query($mysqli,$sql);

                if(!$res){
                    echo "<script>alert('Nickname modification Failed');</script>";

                }

                header("Location: myPage.php");
                exit();
            }

//            echo "<script>opener.location.reload();window.close();</script>";

        }

        mysqli_close($mysqli);
    }
?>

<!DOCTYPE html>
<meta charset="UTF-8"/>
<html>
    <head>
<link href="style/background.css?after" rel="stylesheet" type="text/css" />
        <link href="style/style.css?after" rel="stylesheet" type="text/css" />
    </head>
    <body>
           <?php
                $id = $_GET["id"];
           // echo $id;
                $url = "nicknameChange.php?id=".urlencode($id);
                echo '<form action='.$url.' method="POST">'
            ?>

            <input type="input" class='nickname' id='nickname' name='nickname' maxlength=20
                   value='<?php
                   echo $crt_nickname;?>'>

            <input type="submit" id=rep_bt class=re_bt new_nickname="modify" value='수정'>
        </form>
    </body>
</html>