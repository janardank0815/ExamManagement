<?php

$host = "localhost";
$user =  "root";
$pass =  "";
$dbname = "seat";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "connected successfully....<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentname = $_POST['studentname'];
    $seatno = $_POST['seatnumber'];
    $blockNumber = $_POST['blockNumber'];
    $numRows = $_POST['numRows'];
    $benchNumber = $_POST['benchNumber'];
    $subject = $_POST['subject'];
    $subcode = $_POST['subjectcode'];

    $sql = "INSERT INTO arg1 (studentname, blockNumber, numRows, benchNumber,seatnumber,Subject,SubjectCode) VALUES ('$studentname', '$blockNumber', '$numRows', '$benchNumber','$seatno','$subject','$subcode')";

    if (mysqli_query($conn, $sql)) {
       header("location:Adminseat.html");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    $conn->close();
}
?>
