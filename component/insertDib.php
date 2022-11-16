<?php
    include "../config.php"
?>

<?php
    $sql = "INSERT INTO Dibs (userId, hospitalId) VALUES (?,?)";
    $stmt = mysqli_prepare($mysqli, $sql);
    if ($stmt){
      mysqli_stmt_bind_param($stmt, "ii", $userId, $hospitalId);
      $userId = 1;
      $hospitalId = 1;
      //$userId = $_SESSION['userId'];
      //$hospitalId = $_GET['hospitalId'];
      mysqli_stmt_execute($stmt);
      echo "A Record has been Inserted.";
    }
    else {
      echo "Could not Insert Record: $sql \n".mysqli_error($mysqli);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($mysqli);
?>