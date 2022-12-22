<?php
            // Bas uredan kod jel da
include "../include/header.php";
include "../include/joinsql.php";

if (
    ($_SERVER['REQUEST_METHOD'] === 'POST') &&
    !empty($_POST['personId']) && isset($_POST['personId']) &&
    !empty($_POST['vehicleId']) && isset($_POST['vehicleId']) &&
    !empty($_POST['startTime']) && isset($_POST['startTime']) &&
    !empty($_POST['endTime']) && isset($_POST['endTime'])
) {
    $personId = $_POST['personId'];
    $vehicleId = $_POST['vehicleId'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $id = $_POST['id'];

    $updateQuery = "UPDATE rent SET personId =?, vehicleId =?, startTime =?, endTime =? WHERE id =?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("iissi", $personId, $vehicleId, $startTime, $endTime, $id);
    $updateStmt->execute();

    if ($conn->affected_rows > 0) {
        header("Location: rented.php?status=updateSuccessful");
    } else {
        printf("Oh ne, zajebo si nesto: %s\n" . $conn->error);
    }
    $conn->close();

    die();
} else {
    $rentId = $_GET['id'];

    $selectQuery = "SELECT * FROM rent WHERE id =?";
    $selectStmt = $conn->prepare($selectQuery);
    $selectStmt->bind_param("i", $rentId);
    $selectStmt->execute();
    $selectStmt->bind_result($ID, $person_id, $vehicle_id, $start_time, $end_time);
}

?><!DOCTYPE html>

<html dir=ltr>

    <head>

        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>apdejt</title>

        <link href="../css/reset.css" rel="stylesheet" type="text/css">
        <link href="../css/general.css" rel="stylesheet" type="text/css">

    </head>
    <body>

        <h1>Edit d rent</h1>

        <div class=kingForm>
            <form action="updateRent.php" method="post">

<?php
    while ($selectStmt->fetch()) {
         print '<label>Person ID</label>
                <input type="text" name="personId" value="' . $person_id . '"><br>

                <label>Vehicle ID</label>
                <input type="text" name="vehicleId" value="' . $vehicle_id . '"><br>

                <label>Rent start time</label>
                <input type="datetime-local" name="startTime" value="' . $start_time . '"><br>

                <label>Rent end time</label>
                <input type="datetime-local" name="endTime" value="' . $end_time . '"><br>

                <input type="hidden" name="id" value="' . $ID . '">';
    } ?>
                <button>Edit</button>

            </form>
        </div>

    </body>
</html>