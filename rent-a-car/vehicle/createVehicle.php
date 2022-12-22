<?php

include "../include/joinsql.php";
include "../include/header.php";

if (
    ($_SERVER['REQUEST_METHOD'] === 'POST') &&
    !empty($_POST['manufacturer']) && isset($_POST['manufacturer']) &&
    !empty($_POST['vehicleModel']) && isset($_POST['vehicleModel']) &&
    !empty($_POST['vehicleEngine']) && isset($_POST['vehicleEngine']) &&
    !empty($_POST['vehicleYear']) && isset($_POST['vehicleYear']) &&
    !empty($_POST['consumptionPer100Km']) && isset($_POST['consumptionPer100Km'])
) {
    $sql = "INSERT INTO vehicle (manufacturer, vehicleModel, vehicleEngine, vehicleYear, isRented, isVisible, consumptionPer100Km)
            VALUES ('" . $_POST['manufacturer'] . "', '" . $_POST['vehicleModel'] . "', '" . $_POST['vehicleEngine'] . "',
            '" . $_POST['vehicleYear'] . "', 0, 1, '" . $_POST['consumptionPer100Km'] . "')";
                                     // Bas je fuj ovo
    if ($conn->query($sql) === TRUE) {
        $msg = "New record created successfully";
    } else {
        $msg = "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    $status = "creationSuccessful";
}
?><!DOCTYPE html>
<html dir=ltr>

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add a cmar</title>
    <link href="../css/reset.css" rel="stylesheet" type="text/css">
    <link href="../css/general.css" rel="stylesheet" type="text/css">

</head>

<body>

    <h1>Add a vehicle</h1>

    <div class="kingPodaciSpremljeni<?php if ($status == 'creationSuccessful') print ' kingPodaciSpremljeniOn'; ?>">
            <?php print $msg; ?>
    </div>

    <div class=kingForm>
        <form action="createVehicle.php" method="post">

            <label>Manufacturer</label>
            <input type="text" name="manufacturer"><br>

            <label>Vehicle model</label>
            <input type="text" name="vehicleModel"><br>

            <label>Vehicle engine</label>
            <input type="text" name="vehicleEngine"><br />

            <label>Vehicle year</label>
            <input type="text" name="vehicleYear"><br>

            <label>Liters per 100km</label>
            <input type="number" name="consumptionPer100Km"><br>

            <button>Add</button>

        </form>
    </div>

</body>

</html>