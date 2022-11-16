<?php

    require_once("config.php");
    require_once("addrCoords.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty(trim($_POST["reg_email"])) || empty(trim($_POST["reg_nickname"])) || empty(trim($_POST["reg_password"])) || empty(trim($_POST["reg_age"])) || empty(trim($_POST["reg_location"])) || empty(trim($_POST["reg_sex"]))) {
            echo '<script>alert("Form needs to be completely filled out")</script>';
        } else {
            $reg_email = isset($_POST['reg_email']) ? $_POST['reg_email'] : null;
            $reg_nickname = isset($_POST['reg_nickname']) ? $_POST['reg_nickname'] : null;
            $reg_password = isset($_POST['reg_password']) ? $_POST['reg_password'] : null;
            $reg_age = isset($_POST['reg_age']) ? $_POST['reg_age'] : null;
            $reg_location = isset($_POST['reg_location']) ? $_POST['reg_location'] : null;

            if ($_POST['reg_sex'] == 'female') {
                $reg_sex = 1;
            } else {
                $reg_sex = 2;
            }

            $sql = "SELECT email FROM user WHERE email = '$reg_email'";
            $res = mysqli_query($mysqli, $sql);
            if ($res) {
                if (mysqli_num_rows($res)!=0) {
                    echo '<script>alert("User already exists with same email")</script>';
                }
                else {
                    $data = json_decode(getAddress($reg_location), true);

                    $sql = "SELECT locationId FROM locationdetail WHERE addr='$reg_location'";
                    $duplicateCheck = mysqli_query($mysqli, $sql);

                    if (mysqli_num_rows($duplicateCheck)!=0) {
                        $row = mysqli_fetch_assoc($duplicateCheck);
                        var_dump($row);
                        $row = $row['locationId'];
                    }
                    else {
                        $locationInsert = "INSERT INTO location (x, y) VALUES(
                                                round({$data["documents"][0]['x']}, 3), 
                                                round({$data["documents"][0]['y']}, 3)
                                            )";
                        $locationRes = mysqli_query($mysqli, $locationInsert);

                        $location = "SELECT id FROM location 
                                        WHERE ABS(x-{$data["documents"][0]['x']})<=1E-3 
                                          AND ABS(y-{$data["documents"][0]['y']})<=1E-3";
                        $locationRes = mysqli_query($mysqli, $location);
                        $row = mysqli_fetch_assoc($locationRes);
                        $row = $row['id'];

                        $locationDetailSql = "INSERT INTO locationDetail (locationId, addr, si, gu) VALUES (
                                                              '$row', 
                                                              '$reg_location', 
                                                              '".$data["documents"][0]["address"]["region_1depth_name"]."', 
                                                              '".$data["documents"][0]["address"]["region_2depth_name"]."'
                                                              )";
                        $locationDetailRes = mysqli_query($mysqli, $locationDetailSql);
                    }

                    $bcrypt_pw = password_hash($reg_password, PASSWORD_BCRYPT);

                    $sql = "INSERT INTO user (locationId, sexId, email, nickname, password, age)
                                        VALUES('$row',
                                               '$reg_sex',
                                               '$reg_email',
                                               '$reg_nickname',
                                               '$bcrypt_pw', 
                                               '$reg_age'
                                        )";
                    $res = mysqli_query($mysqli,$sql);

                    header("Location: login.php");
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
                    <form method="POST" action="register.php">
                        <h3>Register Here</h3>

                        <span>Email</span>
                        <div class="input-box">
                            <input type="text" name="reg_email" />
                        </div>

                        <span>Nickname</span>
                        <div>
                            <input type="text" name="reg_nickname" />
                        </div>

                        <span>Password</span>
                        <div>
                            <input type="password" name="reg_password" />
                        </div>

                        <span>Age</span>
                        <div>
                            <input type="text" name="reg_age" />
                        </div>

                        <span>Location</span>
                        <div>
                            <input type="text" name="reg_location" id="address_kakao" readonly />
                        </div>

                        <span>Sex</span>
                        <div>
                            <input type="radio" name="reg_sex" value="female">female
                            <input type="radio" name="reg_sex" value="male">male
                        </div>

                        <br>
                        <input type="submit" />
                    </form>
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