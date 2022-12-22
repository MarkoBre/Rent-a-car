<?php

const PAGE = 'createPerson';

include "../include/header.php";
include "../include/joinsql.php";

$moraoSam = "firstName";

if (
    ($_SERVER['REQUEST_METHOD'] === 'POST') &&
    !empty($_POST['firstName']) && isset($_POST['firstName']) &&
    !empty($_POST['lastName']) && isset($_POST['lastName']) &&
    !empty($_POST['city']) && isset($_POST['city']) &&
    !empty($_POST['country']) && isset($_POST['country']) &&
    !empty($_POST['dateOfBirth']) && isset($_POST['dateOfBirth'])
) {
    $sql = "INSERT INTO person (firstName, lastName, city, country, dateOfBirth, isVisible)
            VALUES ('" . $_POST['firstName'] . "', '" . $_POST['lastName'] . "', '" . $_POST['city'] . "',
            '" . $_POST['country'] . "', '" . $_POST['dateOfBirth'] . "', TRUE )";
                                                                // Bolje da sam stavio default?!?!?
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

        <title>Add persons</title>

        <link href="../css/reset.css" rel="stylesheet" type="text/css">
        <link href="../css/general.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <h1>Create a person</h1>

        <div class="kingPodaciSpremljeni<?php if ($status == 'creationSuccessful') print ' kingPodaciSpremljeniOn'; ?>">
            <?php print $msg; ?>
        </div>

        <div class=kingForm>

            <form action="createPerson.php" method="post">

                <label>First Name</label>
                <input placeholder="Enter your first name..." type="text" name="<?php echo $moraoSam; ?>"><br>

                <label>Last Name</label>
                <input placeholder="Enter your lirst name..." type="text" name="lastName"><br>

                <label>Country</label>
                <input placeholder="Type in your country..." type="text" name="country"><br />

                <label>City</label>
                <input placeholder="Type in your country..." type="text" name="city"><br>

                <label>Birth date</label>
                <input placeholder="Enter your birth date..." type="date" name="dateOfBirth"><br>

                <button>Add</button>

            </form>

        </div>

    </body>

</html>