<?php

include "../include/header.php";
include "../include/joinsql.php";

$pozdravSefe = "DELETE FROM rent WHERE id=?";

$deleteStmt = $conn->prepare($pozdravSefe);
$deleteStmt->bind_param("i", $_GET['id']);
$deleteStmt->execute();

if ($deleteStmt->execute() == TRUE) {
    header("Location: rented.php?deleteSucessful");
} else {
    header("Location: rented.php?deleteUnsucessful");
}
$conn->close();
die();

?>