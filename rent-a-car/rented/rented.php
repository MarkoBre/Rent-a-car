<?php

const PAGE = 'Rents';

include "../include/header.php";
include "../include/joinsql.php";

?><!DOCTYPE html>
<html dir=ltr>

    <head>

        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Car rentovi</title>
        <link href="../css/reset.css" rel="stylesheet" type="text/css">
        <link href="../css/general.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <h1>Rentovi</h1>

        <br>
        <hr>

        <div class="kingPodaciSpremljeni<?php if ($_GET['status'] == 'deleteSuccessful')
            print ' kingPodaciSpremljeniOn'; ?>">Rent deleted successfuly!</div>

        <div class="kingPodaciSpremljeni<?php if ($_GET['status'] == 'updateSuccessful')
            print ' kingPodaciSpremljeniOn'; ?>">Rent updated successfuly!</div>

        <table>

            <thead>
                <td>Rent ID</td>
                <td>Person ID</td>
                <td>First name</td>
                <td>Vehicle ID</td>
                <td>Manufacturer</td>
                <td>Model</td>
                <td>Start time</td>
                <td>End time</td>
                <td></td>
                <td></td>
            </thead>

            <tbody>                                                                                                                                                                                <!-- Znaci default je INNER JOIN  -->
                <?php $rentovi = $conn->query("SELECT rent.id, person.personId, person.firstName, vehicle.vehicleId, vehicle.manufacturer, vehicle.vehicleModel, rent.startTime, rent.endTime FROM ((rent JOIN person ON rent.personId = person.personId) JOIN vehicle ON rent.vehicleId = vehicle.vehicleId) ORDER BY id DESC");

                if ($rentovi->num_rows > 0) {
                    while ($row = $rentovi->fetch_assoc()) {
                        $endTime = date_create($row['endTime']);
                        $startTime = date_create($row['startTime']);

                        if (date_format($endTime, "Y.m.d H:i") <= date("Y.m.d H:i")) {
                            $diff = date_diff($startTime, $endTime);
                            $endTime = $diff->format("Days rented: %a");
                            $startTime = "This rent is over";
                        } elseif (date_format($endTime, "Y.m.d H:i") >= date("Y.m.d H:i")) {
                            $endTime = $row['endTime'];
                            $startTime = $row['startTime'];
                        }
                        print '<tr>
                                    <td>' . $row["id"] . '</td>
                                    <td>' . $row["personId"] . '</td>
                                    <td>' . $row["firstName"] . '</td>
                                    <td>' . $row["vehicleId"] . '</td>
                                    <td>' . $row["manufacturer"] . '</td>
                                    <td>' . $row["vehicleModel"] . '</td>
                                    <td>' . $startTime . '</td>
                                    <td>' . $endTime. '</td>
                                    <td><a href="updateRent.php?id=' . $row["id"] . '">Change</a></td>
                                    <td><a href="deleteRent.php?id=' . $row["id"] . '">Delete</a></td>
                                </tr>';
                    }
                } ?>
            </tbody>

        </table>
    </body>
</html>
