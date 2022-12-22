<?php // Sta mislis o ovom imenu? Mozda bi cak i "db.php" samo bilo bolje

$status = "pivo";
$servername = "localhost";
$username = "root";
$password = "kure1312";
$dbname = "rent_a_car";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>