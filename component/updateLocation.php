<?php
    include "../config.php"
?>

<?php
	$userId = 1;
	$x = 127.123456;
	$y = 37.123456;
	$addr = 'sss';
	$si = 'seoulsi';
	$gu = 'seodaemungu';
	//$userId = $_SESSION['userId'];
	//$hospitalId = $_GET['hospitalId'];
	
	$sqlGetUser = "SELECT * FROM User WHERE id = $userId";
	$resGetUser = mysqli_query($mysqli, $sqlGetUser);
	$userRow = mysqli_fetch_array($resGetUser, MYSQLI_ASSOC);
	$locationId = $userRow['locationId'];

	$sqlUpdateLocation = 
		"UPDATE location
		SET x = $x, y = $y
        where id = $locationId";

	$sqlUpdateLocationdetail =
		"UPDATE locationdetail
		SET addr = $addr, si = $si, gu = $gu
		where id = $locationId";

	$resUpdateLocation = mysqli_query($mysqli, $sqlUpdateLocation);
	$resUpdateLocationdetail = mysqli_query($mysqli, $sqlUpdateLocationdetail);
	if ($resUpdateLocation) {
		echo "A Record has been updated.";
	}
	else {
		echo "Could not update Record: $sql \n".mysqli_error($mysqli);
  	}
	mysqli_close($mysqli);
?>