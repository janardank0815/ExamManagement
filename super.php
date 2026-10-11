<?php
$host = "localhost";
$user =  "root";
$pass =  "";
$dbname = "supervisordata";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "connected successfully....<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $supernm = $_POST['supervisor_name'];
    $superid = $_POST['supervisor_id'];
    $superblk = $_POST['block_no'];
    $supercount = $_POST['student_count'];
    
    
    $sql = "INSERT INTO supervisortb (`supername`,`superid`,`superblk`,`stdcount`) VALUES ('$supernm', '$superid', '$superblk', '$supercount')";
    
    if (mysqli_query($conn, $sql)) {
        header("location: super.html");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
