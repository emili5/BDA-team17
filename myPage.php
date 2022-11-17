<?php
    require_once "component/header.php";
    require_once "userInfo.php";

    if(isset($_SESSION["userID"]) == false){
        header("Location: home.php");
        exit();
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
                <div class="box" style="float:left;">
                    <div>
                        <span><?php echo $userInfo["nickname"];?></span>
                    </div>

                    <div>
                        <span><?php echo $userInfo["email"];?></span>
                    </div>

                    <div>
                        <span><?php echo $userInfo["age"];?></span>
                        <span><?php echo $userInfo["type"];?></span>
                    </div>

                    <form method="POST" action="register.php">

                        <span>Location</span>
                        <div>
                            <input type="text" name="location" id="address_kakao" value="<?php echo $userInfo["addr"]?>" readonly />
                        </div>
                        <input type="submit" />
                    </form>

                    <a href="nicknameChange.php"> Nickname Modify</a>
                    <a href="pwChange.php"> PW Modify</a>
                    <a href="myReview.php">My Review</a>
                    <a href="resign.php">Resign</a>
                </div>
                <div class="box" style="float:right;">
                    <ul class="dibs">
                        <?php
                            for($i=0; $i<count($dibsList); $i=$i+1){
                                $id = $dibsList[$i]["id"];
                                $name = $dibsList[$i]["name"];
                                $url = "hospital.php?id=".urlencode($id);
                                echo "<li><a href='$url'>hospital</a></li>";
                            }
                        ?>
                    </ul>
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