<?php

include "../include/header.php";
include "../include/joinsql.php";

if (
    ($_SERVER['REQUEST_METHOD'] === 'POST') &&
    isset($_POST['firstName']) && !empty($_POST['firstName']) &&
    isset($_POST['lastName']) && !empty($_POST['lastName']) &&
    isset($_POST['city']) && !empty($_POST['city']) &&
    isset($_POST['country']) && !empty($_POST['country']) &&
    isset($_POST['dateOfBirth']) && !empty($_POST['dateOfBirth'])
)   {
    $conn->query("UPDATE person
    SET firstName ='" . $_POST['firstName'] . "', lastName ='" . $_POST['lastName'] . "', city ='" . $_POST['city'] . "',
    country ='" . $_POST['country'] . "', dateOfBirth ='" . $_POST['dateOfBirth'] . "', isVisible ='" . (int)$_POST['isVisible'] . "'
    WHERE personId = '" . $_POST['personId'] . "'");              // Mamu mu jebem sa tinyint ja se mucim sa bool ceo dan testiram

    $conn->close();
    header("Location: persons.php?status=updateSuccessful");

    die();
}   else {
    $selekkt = $conn->query("SELECT * FROM person WHERE personId=" . $_GET['personId']);
    $updatePersona = $selekkt->fetch_assoc();
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

        <h1>Edit a person</h1>

        <div class=kingForm>
            <form action="editPerson.php" method="post">

                <label>First Name</label>
                <input placeholder="Enter your first name..." type="text" name="firstName" value="<?php print $updatePersona['firstName']; ?>"><br>

                <label>Last Name</label>
                <input placeholder="Enter your last name..." type="text" name="lastName" value="<?php print $updatePersona['lastName']; ?>"><br>

                <label>Country</label>
                <input placeholder="Type in your country..." type="text" name="country" value="<?php print $updatePersona['country']; ?>"><br>

                <label>City</label>
                <input placeholder="Type in your city..." type="text" name="city" value="<?php print $updatePersona['city']; ?>"><br>

                <label>Birth date</label>
                <input placeholder="Enter your birth date..." type="date" name="dateOfBirth" value="<?php print $updatePersona['dateOfBirth']; ?>"><br>

                <label>Visible</label>              <!-- Zanimljiv value  -->
                <input type="radio" name="isVisible" value="-128" required /><br>

                <label>Invisible</label>
                <input type="radio" name="isVisible" value="0" /><br>
                <!-- THE PROBLEM WAS THE "personID" INSTEAD OF "personId" READ EVERYTHING CAREFULLY CUZ U LOST 2 HOURS!!!!!!!!!!!!!!!!!!!!!!!!-->
                <input type="hidden" name="personId" value="<?php print $_GET['personId']; ?>" >

                <button>Magic</button>

            </form>
        </div>

    </body>

</html>