<?php
                                    // Error code je 1451
include "../include/joinsql.php";
try {
    $kueri = "DELETE FROM person WHERE personId =?";
    $deleteStmt = $conn->prepare($kueri);
    $deleteStmt->bind_param("i", $_GET['personId']);
    $deleteStmt->execute();
} catch (mysqli_sql_exception $e) {
    $errorCode = $e->getCode();
}
if ($conn->errno == 1451) {
    header("Location: persons.php?status=deleteUnsuccessful");
} elseif ($conn->errno == 0) {
    header("Location: persons.php?status=deleteSuccessful");
}
$conn->close();
die();
?>