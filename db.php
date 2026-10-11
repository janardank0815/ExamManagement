<?php
$host = 'localhost';
$user = 'your_username';
$password = 'your_password';
$database = 'event_registration';

function connectDB() 
{
    global $host, $user, $password, $database;
    $conn = mysqli_connect($host, $user, $password);
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "connected successfully<br>";
    
    $sql = "CREATE DATABASE IF NOT EXISTS $database";
    if (mysqli_query($conn, $sql)) 
    {
        echo "Database created successfully<br>";
    } 
    else 
    {
        echo "Error creating database: " . mysqli_error($conn) . "<br>";
    }
    
    mysqli_select_db($conn, $database);

    $sql = "CREATE TABLE IF NOT EXISTS participants (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        phone VARCHAR(15) NOT NULL
    )";
    if (mysqli_query($conn, $sql))
    {
        echo "Table created successfully<br>";
    } 
    else 
    {
        echo "Error creating table: " . mysqli_error($conn) . "<br>";
    }

    return $conn;
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}


function validatePhone($phone) {
    return preg_match("/^[0-9]{10}$/", $phone);
}


function registerParticipant($name, $email, $phone) {
    $conn = connectDB();
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $phone = mysqli_real_escape_string($conn, $phone);
    
    $sql = "INSERT INTO participants (name, email, phone) VALUES ('$name', '$email', '$phone')";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}
?>
