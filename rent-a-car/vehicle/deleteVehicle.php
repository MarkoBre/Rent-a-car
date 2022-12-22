<?php

include "../include/joinsql.php";

$vehicleId = $_GET['vehicleId'];

try {
    $kueri = "DELETE FROM vehicle WHERE vehicleId =?";
    $deleteStmt = $conn->prepare($kueri);
    $deleteStmt->bind_param("i", $vehicleId);
    $deleteStmt->execute();
} catch (mysqli_sql_exception $e) {
    $errorCode = $e->getCode();
}
if ($conn->errno == 1451) {
    header("Location: vehicles.php?status=deleteUnsuccessful");
} elseif ($conn->errno == 0) {
    header("Location: vehicles.php?status=deleteSuccessful");
}

$conn->close();

die();
?>