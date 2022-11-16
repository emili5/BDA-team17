<!DOCTYPE html>
<meta charset="UTF-8"/>
<html>
    <head>
        <style>
        </style>
    </head>
    <body>
        <header>
            <nav id="navbar">
                <div class="logo">
                    <a href="home.php"><a href="home.php">Home</a>
                </div>
                <ul class="menu">
                    <?php
                        if (isset($_SESSION['userID']) === false){
                            ?>
                            <li><a href="register.php">Register</a></li>
                            <li><a href="login.php">Login</a></li>
                            <?php
                        }else{
                            if(isset($_SESSION["userID"])){
                                echo $_SESSION["userID"];
                            }
                            ?>
                            <li><a href="myPage.php">Mypage</a></li>
                            <li><a href="logout.php">Logout</a></li>
                            <?php
                        }
                    ?>
                </ul>
            </nav>
        </header>
    </body>
</html>