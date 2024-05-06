<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="CodePel" />
    <title>Hotel Booking Form</title>
   
    <link rel="stylesheet" href="./css/style.css" />
    
    <link rel="stylesheet" href="./css/demo.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nanum+Gothic" />

    <style>
        body {
            font-family: 'Nanum Gothic', sans-serif; 
            margin: 0;
            padding: 0;
            background-color:#fff;
        }

        .cd__intro {
            background-color:black;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .cd__main {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .elem-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="number"] {
            width: 80px;
        }

        button[type="submit"],
        button#displayButton {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 10px; /* Added margin to separate buttons */
        }

        button[type="submit"]:hover,
        button#displayButton:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
<header class="cd__intro">
    <h1>Hotel Booking Form</h1>
    <div class="cd__action"></div>
</header>

<main class="cd__main">
    
    <form class="booking-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="elem-group">
            <label for="name">Your Name</label>
            <input
                    type="text"
                    id="name"
                    name="fullname"
                    placeholder="YOUR NAME"
                    
                    required
            />
        </div>
        <div class="elem-group">
            <label for="email">Your E-mail</label>
            <input
                    type="email"
                    id="email"
                    name="E_mail"
                    placeholder="YOUR EMAIL"
                    required
            />
        </div>
        <div class="elem-group">
            <label for="phone">Your Phone</label>
            <input
                    type="tel"
                    id="phone"
                    name="Mobilenumber"
                    placeholder="ENTER THE NUMBER "
                    maxlength="10" pattern="[0-9]{10}"
        title="Please enter a 10-digit phone number"
        required
            />
        </div>
        <hr />
        <div class="elem-group inlined">
            <label for="adult">Adults</label>
            <input
                    type="number"
                    id="adult"
                    name="Adults"
                    placeholder="0"
                    min="1"
                    required
            />
        </div>
        <div class="elem-group inlined">
            <label for="child">Children</label>
            <input
                    type="number"
                    id="child"
                    name="Children"
                    placeholder="0"
                    min="0"
                    required
            />
        </div>
        <div class="elem-group inlined">
            <label for="checkin-date">Check-in Date</label>
            <input type="date" id="checkin-date" name="Check_in_Date" min="<?php echo date('Y-m-d'); ?>" required />
        </div>
        <div class="elem-group inlined">
            <label for="checkout-date">Check-out Date</label>
            <input type="date" id="checkout-date" name="Check_out_Date" min="<?php echo date('Y-m-d'); ?>" required />
        </div>
        <div class="elem-group">
            <label for="room-selection">Select Room Preference</label>
            <select id="room-selection" name="RoomPreference" required>
                <option value="">Choose a Room from the List</option>
                <option value="connecting">Connecting</option>
                <option value="adjoining">Adjoining</option>
                <option value="adjacent">Adjacent</option>
            </select>
        </div>
        <hr />
        <div class="elem-group">
            <label for="message">Anything Else?</label>
            <textarea
                    id="message"
                    name="Anythingelse"
                    placeholder="Tell us anything else that might be important."
                    required
            ></textarea>
        </div>
        <button type="submit">Book The Rooms</button>
    </form>
    <button type="button" id="displayButton">Display Bookings</button>
    
</main>

<footer class="cd__credit"></footer>

<script src="./js/script.js"></script>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli('localhost', 'root','','project');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = htmlspecialchars($_POST['fullname']);
    $E_mail = htmlspecialchars($_POST['E_mail']);
    $Mobilenumber = htmlspecialchars($_POST['Mobilenumber']);
    $Adults = htmlspecialchars($_POST['Adults']);
    $Children = htmlspecialchars($_POST['Children']);
    $Check_in_Date = htmlspecialchars($_POST['Check_in_Date']);
    $Check_out_Date = htmlspecialchars($_POST['Check_out_Date']);
    $RoomPreference = htmlspecialchars($_POST['RoomPreference']);
    $Anythingelse = htmlspecialchars($_POST['Anythingelse']);

    $sql = "INSERT INTO information (fullname, E_mail, Mobilenumber, Adults, Children, Check_in_Date, Check_out_Date, RoomPreference, Anythingelse)
            VALUES ('$fullname', '$E_mail', '$Mobilenumber', '$Adults', '$Children', '$Check_in_Date', '$Check_out_Date', '$RoomPreference', '$Anythingelse')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}           

$conn->close();
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var displayButton = document.getElementById('displayButton');

        displayButton.addEventListener('click', function() {
            window.location.href = 'display_bookings.php';
        });
    });
</script>
</body>
</html>
