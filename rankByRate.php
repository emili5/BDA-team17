<?php
	require_once "config.php";

	$kindnessAvgHosp = $speedAvgHosp = $cleanlinessAvgHosp = [];

	
	$sql = "SELECT rank() OVER (ORDER BY kindnessAvg DESC)
				AS rank, name, kindnessAvg
			FROM Hospital
			LIMIT 5";
	$res = mysqli_query($mysqli, $sql);

	while ($row = mysqli_fetch_assoc($res)) {

		array_push($kindnessAvgHosp, $row);

	}

	$sql = "SELECT rank() OVER (ORDER BY speedAvg DESC)
				AS rank, name, speedAvg
			FROM Hospital
			LIMIT 5";
	$res = mysqli_query($mysqli, $sql);

	while ($row = mysqli_fetch_assoc($res)) {

		array_push($speedAvgHosp, $row);

	}

	$sql = "SELECT rank() OVER (ORDER BY cleanlinessAvg DESC)
				AS rank, name, cleanlinessAvg
			FROM Hospital
			LIMIT 5";
	$res = mysqli_query($mysqli, $sql);
	while ($row = mysqli_fetch_assoc($res)) {

		array_push($cleanlinessAvgHosp);

	}

//	var_dump($kindnessAvgHosp);
//	var_dump($speedAvgHosp);
//	var_dump($cleanlinessAvgHosp);

//	mysqli_close($mysqli);
?>

