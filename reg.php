<?php
$host = "localhost";
$user =  "root";
$pass =  "";
$dbname = "regdata";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "connected successfully....<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstnm = $_POST['first'];
    $lastnm = $_POST['last'];
    $seatno1 = $_POST['seatno1'];
    $email1 = $_POST['email'];
    $password1 = $_POST['pass'];
    if (isset($_POST["role"]) && !empty($_POST["role"])) {
        $userType = $_POST["role"];

        
        $sql = "INSERT INTO registerdata1 (`first name`, `last name`, `seat number`, `email`, `password`, `role`) VALUES ('$firstnm', '$lastnm', '$seatno1', '$email1', '$password1', '$userType')";
    }

    if (mysqli_query($conn, $sql)) {
        header("location:index.html");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
