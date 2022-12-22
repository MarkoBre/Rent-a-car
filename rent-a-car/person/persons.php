<?php

const PAGE = 'persons';

include "../include/joinsql.php";
include "../include/header.php";

?><!DOCTYPE html>

<html>

    <head>

        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Rent a osoba</title>
        <link href="../css/reset.css" rel="stylesheet" type="text/css">
        <link href="../css/general.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <h1>Persons</h1>

        <br>
        <hr>

        <div class="kingPodaciSpremljeni<?php if ($_GET['status'] == 'deleteSuccessful')
            print ' kingPodaciSpremljeniOn'; ?>">Person deleted successfuly!!!</div>
        <div class="kingPodaciSmrde<?php if ($_GET['status'] == 'deleteUnsuccessful')
            print ' kingPodaciSpremljeniOn'; ?>">If he is dead, make him invisible</div>
        <div class="kingPodaciSpremljeni<?php if ($_GET['status'] == 'updateSuccessful')
            print ' kingPodaciSpremljeniOn'; ?>">Person updated successfuly!!!</div>

        <!-- Table to display persons -->

        <table>

            <thead>
                <td>ID</td>
                <td>First name</td>
                <td>Last name</td>
                <td>City</td>
                <td>Country</td>
                <td>Age</td>
                <td>Visibility</td>
                <td></td>
                <td></td>
            </thead>

            <tbody>
                <?php $ljudi = $conn->query("SELECT * FROM person ORDER BY personId DESC");
                if ($ljudi->num_rows > 0) {
                    while ($red = $ljudi->fetch_assoc()) {
                        $today = date("Y-m-d");
                        $dateOfBirth = $red['dateOfBirth'];
                        $diff = date_diff(date_create($dateOfBirth), date_create($today));

                        $visibility = $red['isVisible'];
                        if ($visibility == TRUE) {
                            $visibility = "Visible";
                        } else {
                            $visibility = "Not visible";
                        }
                        print '<tr>
                                    <td>' . $red["personId"] . '</td>
                                    <td>' . $red["firstName"] . '</td>
                                    <td>' . $red["lastName"] . '</td>
                                    <td>' . $red["city"] . '</td>
                                    <td>' . $red["country"] . '</td>
                                    <td>' . $diff->format("%Y") . '</td>
                                    <td>' . $visibility . '</td>
                                    <td> <a href="editPerson.php?personId=' . $red["personId"] . '">Change</a> </td>
                                    <td> <a href="deletePerson.php?personId=' . $red["personId"] . '">Delete</a></td>
                                </tr>';
                    }
                } ?>
            </tbody>

        </table>

    </body>

</html>