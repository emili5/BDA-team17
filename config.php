<?php
    define('DB_HOST', 'localhost');
    define('DB_ID', 'team17');
    define('DB_PW', 'team17');
    define('DB_NAME', 'team17');

    // Connect MySQL DB
    $mysqli = mysqli_connect(DB_HOST, DB_ID, DB_PW, DB_NAME);

    // Connection Check
    if($mysqli === false){
        die("ERROR: Could not connect to MySQL DB." . mysqli_connect_error());
    }
?>
