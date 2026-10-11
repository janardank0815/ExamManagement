<?php
$host= "localhost";
$username = "";
$pass = "";
$dbname = "varun";
$conn = mysqli_connect( $host, $username, $pass, $dbname);

if( !$conn )
{
    die("THE CONNECTION WAS FAILED".mysqli_connect_error( $conn));


}
$sql = "SELECT FROM var";
$result = mysqli_query($conn,$sql);

foreach($result as $i)
{
    echo $i['name'].''['rollno'];
}
mysqli_close( $conn);








?>