<HTML>

<HEAD>

    <h2>닉네임 수정</h2>
</HEAD>

<BODY>
<?php

//       $password=$_POST['password'];
       $password='1234';
       $nickname=$_POST['nickname'];
       $userId=1;
    require_once "config.php";

    if (isset($_POST['nickname'])){
    $val=$_POST['nickname'];
    //echo $val;

    if ($val!=null&&$val!=""){
    $sql="update user set nickname='$val' where id='$userId'";
    $res = mysqli_query($mysqli,$sql);

    if(!$res){
                    echo "<script>alert('fail');</script>";

            }
             mysqli_close($mysqli);

        }


            echo "<script>opener.location.reload();window.close();</script>";

    }
?>

  <form action="modifyNickname.php" method="post">

        <input type="input" class='nickname' id='nickname' name='nickname' maxlength=20
            value='<?php echo $nickname;?>'>



            <input type="submit" id=rep_bt class=re_bt value="modify">


    </form>
</BODY>

</HTML>