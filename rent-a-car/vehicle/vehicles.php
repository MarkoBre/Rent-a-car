<?php

const PAGE = 'vehicles';

include "../include/joinsql.php";
include "../include/header.php";

?><!DOCTYPE html>
<html dir=ltr>

    <head>

        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Rent a cmar</title>
        <link href="../css/reset.css" rel="stylesheet" type="text/css">
        <link href="../css/general.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <h1>Kolca</h1>

        <br>
        <hr>

        <div class="kingPodaciSpremljeni<?php if ($_GET['status'] == 'deleteSuccessful')
            print ' kingPodaciSpremljeniOn'; ?>">Vehicle deleted successfuly!</div>

        <div class="kingPodaciSpremljeni<?php if ($_GET['status'] == 'updateSuccessful')
            print ' kingPodaciSpremljeniOn'; ?>">Vehicle updated successfuly!</div>

        <table>

            <thead>
                <td>ID</td>
                <td>Manufacturer</td>
                <td>Model</td>
                <td>Engine</td>
                <td>Year</td>
                <td>L/100km</td>
                <td>Rented</td>
                <td>Visibility</td>
                <td></td>
                <td></td>
            </thead>

            <tbody>                                    <!-- Vise mi se svidja switch nego if za sql  -->
                <?php $kolca = $conn->query("SELECT *, CASE WHEN isVisible = 0 Then 'Not visible' ELSE 'Visible' END AS visibilityText FROM vehicle ORDER BY vehicleId DESC");
                // PODSETNIK DA NAPRAVIM SA PREPARE STMTS!!!!!!!!!!!!!!!!!!!!!!
                if ($kolca->num_rows > 0) {
                    while ($row = $kolca->fetch_assoc()) {
                        if ($row['isRented'] == TRUE) {
                            $checkRent = '<input type="checkbox" name="isRented" checked>';
                        } else {
                            $checkRent = '<input type="checkbox" name="isRented">';
                        }
                        /*$visibility = $row['isVisible'];
                            if ($visibility == TRUE) {
                                $visibility = "Visible";
                            } else {
                                $visibility = "Not visible";
                            }*/
                        print '<tr>
                                    <td>' . $row["vehicleId"] . '</td>
                                    <td>' . $row["manufacturer"] . '</td>
                                    <td>' . $row["vehicleModel"] . '</td>
                                    <td>' . $row["vehicleEngine"] . '</td>
                                    <td>' . $row["vehicleYear"] . '</td>
                                    <td>' . $row["consumptionPer100Km"] . '</td>
                                    <td>' . $checkRent . '</td>
                                    <td>' . $row['visibilityText'] . '</td>
                                    <td><a href="editVehicle.php?vehicleId=' . $row["vehicleId"] . '">Change</a></td>
                                    <td><a href="deleteVehicle.php?vehicleId=' . $row["vehicleId"] . '">Delete</a></td>
                                </tr>';
                    }
                } ?>
            </tbody>

        </table>

    </body>

</html>