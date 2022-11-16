<?php
    include "../config.php"
?>

<?php
	$userId = 1;
	$hospitalId = 1;
	//$userId = $_SESSION['userId'];
	//$hospitalId = $_GET['hospitalId'];
	$sql = "DELETE FROM Dibs WHERE userId = $userId AND hospitalId = $hospitalId";
	$res = mysqli_query($mysqli, $sql);
	if ($res) {
		echo "A Record has been Deleted.";
	}
	else {
		echo "Could not Delete Record: $sql \n".mysqli_error($mysqli);
  	}
	mysqli_close($mysqli);
?>