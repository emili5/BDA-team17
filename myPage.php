<?php
    header('Content-Type: text/html; charset=utf-8');
    require_once "component/header.php";
    require_once "userInfo.php";

    if(isset($_SESSION["userID"]) == false){
        header("Location: login.php");
        exit();
    }
    else{
    $userId=$_SESSION['userID'];

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
                <div class="box" style="float: left; margin-right:50%;">
                    <div>
                        <h1><?php echo $userInfo["nickname"];?></h1>
                    </div>

                    <div>
                        <span><?php echo $userInfo["email"];?></span>
                    </div>

                    <div>
                        <span><?php echo $userInfo["age"];?></span>
                        <span><?php echo $userInfo["type"];?></span>
                    </div>

                    <br>
                    <form method="POST" action="register.php">
                        <span><b>Location</b></span>
                        <input type="text" name="location" id="address_kakao" value="<?php echo $userInfo["addr"]?>" readonly style="padding-top:10px"/>
                        <input type="submit" value="MODIFY"/>
                    </form>

                    <br>
                    <br>

                    <form action="nicknameChange.php" method="post">
                    <?php
                        $url="nicknameChange.php?id=".urlencode($userId);
                        echo "<a href='$url'> Nickname Modify</a>";
                    ?>
                    </form>
                    <a href="pwChange.php"> PW Modify</a>
                    <a href="myReview.php">My Review</a>
                    <a href="resign.php">Resign</a>
                </div>
                <div class="box" style="float: right; margin-left:50%;">
                    <h2>Dibs List</h2>
                        <?php
                            for($i=0; $i<count($dibsList); $i=$i+1){
                                $id = $dibsList[$i]["id"];
                                $name = $dibsList[$i]["name"];
                                $url = "hospital.php?id=".urlencode($id);
                                echo "<span><a href='$url'>".$name."</a></span>";
                            }
                        ?>
                </div>
            </div>
        </div>
    </body>

    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script>
        window.onload = function(){
            document.getElementById("address_kakao").addEventListener("click", function(){
                new daum.Postcode({
                    oncomplete: function(data) {
                        document.getElementById("address_kakao").value = data.address;
                    }
                }).open();
            });
        }
    </script>
</html>