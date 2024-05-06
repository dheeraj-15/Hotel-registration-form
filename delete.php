<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["booking_id"]) && !empty($_POST["booking_id"])) {
       
        $booking_id = $conn->real_escape_string($_POST["booking_id"]);


        $sql = "DELETE FROM information WHERE E_mail = '$booking_id'";

        if ($conn->query($sql) === TRUE) {
            echo "Booking deleted successfully";
        } else {
            echo "Error deleting booking: " . $conn->error;
        }
    } else {
        echo "Booking ID not provided";
    }
}

$conn->close();
?>
