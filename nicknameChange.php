<?php
    require_once "config.php";

    if(isset($_SESSION["userID"]) == false){
        header("Location: home.php");
        exit();
    }
    else {
        $userID = $_SESSION["userID"];
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

    </head>
    <body>
        <form action="nicknameChange.php" method="post">

            <input type="input" class='nickname' id='nickname' name='nickname' maxlength=20
                   new_nicknameue='<?php
                   echo $crt_nickname;?>'>

            <input type="submit" id=rep_bt class=re_bt new_nicknameue="modify">
        </form>
    </body>
</html>