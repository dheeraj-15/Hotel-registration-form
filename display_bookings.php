<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Bookings</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Bookings Information</h2>
    <table>
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Adults</th>
            <th>Children</th>
            <th>Check-in Date</th>
            <th>Check-out Date</th>
            <th>Room Preference</th>
            <th>Other Information</th>
            <th>Action</th> 
        </tr>
        <?php
          
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "project";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            
            $sql = "SELECT * FROM information";
            $result = $conn->query($sql);

            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["fullname"] . "</td>";
                    echo "<td>" . $row["E_mail"] . "</td>";
                    echo "<td>" . $row["Mobilenumber"] . "</td>";
                    echo "<td>" . $row["Adults"] . "</td>";
                    echo "<td>" . $row["Children"] . "</td>";
                    echo "<td>" . $row["Check_in_Date"] . "</td>";
                    echo "<td>" . $row["Check_out_Date"] . "</td>";
                    echo "<td>" . $row["RoomPreference"] . "</td>";
                    echo "<td>" . $row["Anythingelse"] . "</td>";
               
                    echo "<td><form action='delete.php' method='post'><input type='hidden' name='booking_id' value='" . $row["E_mail"] . "'><input type='submit' value='Delete'></form></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='10'>No bookings found</td></tr>";
            }
            $conn->close();
        ?>
    </table>
</body>
</html>
