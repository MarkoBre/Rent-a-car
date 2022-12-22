<?php

include "../include/joinsql.php";
include "../include/header.php";

if (
    ($_SERVER['REQUEST_METHOD'] === 'POST') &&
        isset($_POST['manufacturer']) && !empty($_POST['manufacturer']) &&
        isset($_POST['vehicleModel']) && !empty($_POST['vehicleModel']) &&
        isset($_POST['vehicleEngine']) && !empty($_POST['vehicleEngine']) &&
        isset($_POST['vehicleYear']) && !empty($_POST['vehicleYear']) &&
        isset($_POST['consumptionPer100Km']) && !empty($_POST['consumptionPer100Km'])
)   {
    $conn->query("UPDATE vehicle
    SET manufacturer = '" . $_POST['manufacturer'] . "', vehicleModel = '" . $_POST['vehicleModel'] . "',
    vehicleEngine ='" . $_POST['vehicleEngine'] . "', vehicleYear ='" . $_POST['vehicleYear'] . "', isRented ='" . (int)$_POST['isRented'] . "',
    isVisible ='" . (int)$_POST['isVisible'] . "', consumptionPer100Km ='" . $_POST['consumptionPer100Km'] . "'
    WHERE vehicleId ='" . $_POST['vehicleId'] . "'");

    $conn->close();
    header("Location: vehicles.php?status=updateSuccessful");

    die();
}   else {
    $selekkt = $conn->query("SELECT * FROM vehicle WHERE vehicleId =" . $_GET['vehicleId']);
    $updateDaCar = $selekkt->fetch_assoc();
}
?><!DOCTYPE html>
<html dir=ltr>

    <head>

        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>edit a cmar</title>
        <link href="../css/reset.css" rel="stylesheet" type="text/css">
        <link href="../css/general.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <h1>Edit a vehicle</h1>

        <div class=kingForm>
            <form action="editVehicle.php" method="post">

                <label>Manufacturer</label>
                <input type="text" name="manufacturer" value="<?php print $updateDaCar['manufacturer'];?>"><br>

                <label>Vehicle model</label>
                <input type="text" name="vehicleModel" value="<?php print $updateDaCar['vehicleModel'];?>"><br>

                <label>Vehicle engine</label>
                <input type="text" name="vehicleEngine" value="<?php print $updateDaCar['vehicleEngine'];?>"><br />

                <label>Vehicle year</label>
                <input type="text" name="vehicleYear" value="<?php print $updateDaCar['vehicleYear'];?>"><br>

                <label>Liters per 100km</label>
                <input type="number" name="consumptionPer100Km" value="<?php print $updateDaCar['consumptionPer100Km'];?>"><br>

                <label>Visible</label>
                <input type="radio" name="isVisible" value="-69" required /><br>

                <label>Invisible</label>
                <input type="radio" name="isVisible" value="0.00" /><br><br>

                <label>Rented</label>       <!--  Maximum tinyint koji je TRUE? -->
                <input type="radio" name="isRented" value="127" required /><br>

                <label>Not rented</label>
                <input type="radio" name="isRented" value="-0" /><br>

                <input type="hidden" name="vehicleId" value="<?php print $_GET['vehicleId'];?>">

                <button>Edit</button>

            </form>
        </div>

    </body>

</html>