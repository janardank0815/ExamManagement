<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "icre_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['Student_name'];
    $enrollment_number = $_POST['enrollment_number'];
    $hall_ticket_file = $_POST['hall_ticket_file'];
    

    if (empty($hall_ticket_file)) {
        echo "Hall ticket link is required.";
        exit();
    }

    $sql = "INSERT INTO hall_tickets1 (student_name, enrollment_number, hall_ticket_file) VALUES ('$student_name', '$enrollment_number', '$hall_ticket_file')";

    if ($conn->query($sql) === TRUE) {
        header("location:holl.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
