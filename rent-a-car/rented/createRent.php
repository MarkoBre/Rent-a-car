<?php

include "../include/header.php";
include "../include/joinsql.php";
$damn = "personId";

if (
    ($_SERVER['REQUEST_METHOD'] === 'POST') &&
    !empty($_POST['personId']) && isset($_POST['personId']) &&
    !empty($_POST['vehicleId']) && isset($_POST['vehicleId']) &&
    !empty($_POST['startTime']) && isset($_POST['startTime']) &&
    !empty($_POST['endTime']) && isset($_POST['endTime'])
) {         // Taman se ovako smanjuju sanse za hakere poput mene da upadaju u sql :D
    $insertStmt = $conn->prepare("INSERT INTO rent (personId, vehicleId, startTime, endTime) VALUES (?, ?, ?, ?)");
    $insertStmt->bind_param("iiss", $_POST['personId'], $_POST['vehicleId'], $_POST['startTime'], $_POST['endTime']);
    $insertStmt->execute();
    $rentId = $conn->insert_id;
            // Ovako da se naviknem uvek da unosim, dosta bolja navika
    $updateStmt = $conn->prepare("UPDATE vehicle SET isRented =69 WHERE vehicleId = ?");
    $updateStmt->bind_param("i", $_POST['vehicleId']);
    $updateStmt->execute();

    $conn->commit();

    if ($conn == TRUE) {
        $msg = "IDE GASSS";
    } else
        ($msg = "Error: " . $sql . "<br>" . $conn->error);

    $insertStmt->close();
    $updateStmt->close();
    $conn->close();
    $status = "creationSuccessful";
}
?><!DOCTYPE html>

<html dir=ltr>

    <head>

        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>tako je</title>

        <link href="../css/reset.css" rel="stylesheet" type="text/css">
        <link href="../css/general.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <h1>Create d rent</h1>

        <div class="kingPodaciSpremljeni<?php if ($status == 'creationSuccessful') print ' kingPodaciSpremljeniOn'; ?>">
            <?php print $msg; ?>
        </div>

        <div class=kingForm>

            <form action="createRent.php" method="post">

                <label>Person ID</label>
                <input placeholder="Enter persons ID..." type="number" name="<?php echo $damn;?>"><br>

                <label>Vehicle ID</label>
                <input placeholder="Enter vehicle ID..." type="number" name="vehicleId"><br />

                <label>Insert rent start time</label>
                <input type="datetime-local" name="startTime"><br>

                <label>Insert rent end time</label>
                <input type="datetime-local" name="endTime"><br>

                <button>Add</button>

            </form>

        </div>

    </body>

</html>