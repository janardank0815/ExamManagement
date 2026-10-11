<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Feedback Form</title>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #121212; /* Dark background */
        color: #ffffff; /* White text */
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        background-color: #1e1e1e; /* Darker container background */
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    }

    h2 {
        text-align: center;
        color: #1db954; /* Spotify Green */
        margin-bottom: 30px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 15px;
        border: 1px solid #333333; /* Darker border */
        text-align: left;
    }

    th {
        background-color: #333333; /* Darker header background */
        color: #1db954; /* Spotify Green for header text */
    }

    tr:nth-child(even) {
        background-color: #2c2c2c; /* Even row color */
    }

    tr:hover {
        background-color: #333333; /* Darker hover background */
    }

</style>
</head>
<body>
    <div class="container">
        <h2>Feedback List</h2>

        <?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "FEEDBACK";

        // Establishing connection to the database
        $conn = mysqli_connect($host, $user, $pass, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Fetching feedback from the database
        $sql = "SELECT * FROM feed1";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th>Name</th><th>Email</th><th>Message</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td>" . htmlspecialchars($row['message']) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No feedback found.</p>";
        }

        // Closing database connection
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
