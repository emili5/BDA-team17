<?php
    require_once "config.php";

    if(isset($_SESSION["userID"]) == false){
        header("Location: home.php");
        exit();
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty(trim($_POST["current_pw"]))||empty(trim($_POST["new_pw"]))||empty(trim($_POST["new_pw_confirm"]))){
            echo '<script>alert("Form needs to be completely filled out")</script>';
        }
        else {
            $current_id = $_SESSION["userID"];
            $current_pw = $_POST["current_pw"];
            $new_pw = $_POST["new_pw"];
            $new_pw_confirm = $_POST["new_pw_confirm"];

            $sql = "SELECT password FROM user WHERE id='$current_id'";
            $res = mysqli_query($mysqli,$sql);

            $row = mysqli_fetch_assoc($res);

            if ($new_pw==$new_pw_confirm && password_verify($current_pw, $row['password'])){
                if ($new_pw_confirm==$current_pw){
                    echo '<script>alert("New password is same as old one")</script>';
                }
                else {
                    $bcrypt_pw = password_hash($new_pw_confirm, PASSWORD_BCRYPT);

                    $sql = "UPDATE user SET password='".$bcrypt_pw."' WHERE id='".$current_id."'";

                    $res = mysqli_query($mysqli,$sql);

                    header("Location: mypage.php");
                }
            }
            else {
                echo '<script>alert("New password not confirmed")</script>';
            }
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
        <div class="ocean">
            <div class="wave"></div>
            <div class="wave"></div>
        </div>
        <div class="content">
            <div class="centered">
                <div class="box">
                    <form method="POST" action="pwChange.php">
                        <h3>Modify Password</h3>
                        <p>Current Password</p>
                        <input type="password" name="current_pw" />

                        <p>New Password</p>
                        <input type="password" name="new_pw" />

                        <p>Password Confirmation</p>
                        <input type="password" name="new_pw_confirm" />

                        <br>
                        <input type="submit" />
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
