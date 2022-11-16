<?php
    include "../config.php"
?>

<?php
	$userId = 3;
	$x = 127.123456;
	$y = 37.123456;
	//$x = userLocation['x'];
	//$y = userLocation['y'];
	//$userId = $_SESSION['userId'];
	
	$sql = "SELECT *
			FROM Category";


	$res = mysqli_query($mysqli, $sql);
	
	// 콤보박스 만들기
	printf("<select name='category'>");
	if ($res) {
		while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
			$name = $row['name'];
			printf("<option value='$name'>$name</option>");
		}
	}
	else {
		echo "Could not rank Record: $sql \n".mysqli_error($mysqli);
  	}
	printf("</select>");
	
	// 콤보박스 만들기
	printf("<select name='vaccine'>");
	if ($res) {
		while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
			$name = $row['name'];
			printf("<option value='$name'>$name</option>");
		}
	}
	else {
		echo "Could not rank Record: $sql \n".mysqli_error($mysqli);
  	}

	mysqli_close($mysqli);
?>

