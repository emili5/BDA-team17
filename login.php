<?php
    require_once "config.php"; 

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty(trim($_POST["lg_email"]))||empty(trim($_POST["lg_password"]))){
            echo '<script>alert("Form needs to be completely filled out")</script>';
        }else{
            $lg_email = $_POST["lg_email"];
            $lg_password = $_POST["lg_password"];

            $sql = "SELECT id, email, password FROM user WHERE email = '$lg_email'";
            $res = mysqli_query($mysqli,$sql);
            if($res){
                if (mysqli_num_rows($res)==0){
                    echo '<script>alert("User not existed with this email")</script>';
                }
                else {
                    $row = mysqli_fetch_assoc($res);
                    $pw_check = password_verify($lg_password, $row['password']);

                    if ($pw_check) {
                        session_start();
                        $_SESSION["userID"] = $row['id'];

                        header("Location: home.php");
                    }
                    else {
                        echo '<script>alert("Wrong password")</script>';
                    }
                }
            }
            else {
                echo 'Error occured';
            }
        }

        mysqli_close($mysqli);
    }
?>

<!DOCTYPE html>
<meta charset="UTF-8"/>
<html>
    <head>
        <link href="style/background.css" rel="stylesheet" type="text/css" />
        <link href="style/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="ocean">
            <div class="wave"></div>
            <div class="wave"></div>
        </div>
        <div class="content">
            <div class="centered">
                <div class="box">
                    <form method="POST" action="login.php">
                        <h3>Login Here</h3>
                        <p>email :</p>
                        <input type="text" name="lg_email" />

                        <p>password :</p>
                        <input type="password" name="lg_password" />

                        <br>
                        <input type="submit" />
                    </form>
                </div>
            </div>
        </div>
    </body>
</html