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
	
	$sql = "SELECT row_number() 
			OVER (ORDER BY (kindnessAvg + speedAvg + cleanlinessAvg)/3.0 DESC) 
			AS rank, name, phoneNumber, kindnessAvg, speedAvg, cleanlinessAvg
			FROM Hospital";
	$res = mysqli_query($mysqli, $sql);
	if ($res) {
		while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
			$rank = $row['rank'];
			$name = $row['name'];
			$phoneNumber = $row['phoneNumber'];
			$kindnessAvg = $row['kindnessAvg'];
			$speedAvg = $row['speedAvg'];
			$cleanlinessAvg = $row['cleanlinessAvg'];

			//$distance = sqrt(pow($hospitalX - $x, 2) + pow($hospitalY - $y, 2));
			printf("순위: $rank<br>");
			printf("병원이름: $name<br>");
			printf("전화번호: $phoneNumber<br>");
			printf("친절해요: $kindnessAvg<br>");
			printf("대기시간 짧아요: $speedAvg<br>");
			printf("청결해요: $cleanlinessAvg<br>");
			printf("<br>");
		}
	}
	else {
		echo "Could not rank Record: $sql \n".mysqli_error($mysqli);
  	}
	mysqli_close($mysqli);
?>

