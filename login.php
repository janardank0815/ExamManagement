<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "regdata";


$conn = new mysqli($host, $user, $pass, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $seatno = $_POST['seat'] ?? '';
    $password = $_POST['pass'] ?? '';
    $userType = $_POST['role'] ?? '';

    if (!empty($seatno) && !empty($password) && !empty($userType)) {
        
        $stmt = $conn->prepare("SELECT `first name`, `last name`, `seat number`, `email`, `role` FROM registerdata1 WHERE `seat number` = ? AND password = ? AND role = ?");
        $stmt->bind_param("sss", $seatno, $password, $userType);
        $stmt->execute();
        $result = $stmt->get_result();

       
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $_SESSION['first_name'] = $row['first name'];
            $_SESSION['last_name'] = $row['last name'];
            $_SESSION['seat_number'] = $row['seat number'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $row['role'];

            
            if ($userType === "student") {
                header("Location: usermain.html");
                exit();
            } elseif ($userType === "teacher") {
                header("Location: MainAdmin.html");
                exit();
            }
        } else {
            showToast("Login failed. Please check your credentials.");
        }

        $stmt->close();
    } else {
        showToast("Please fill in all fields and select a role.");
    }

    $conn->close();
}


function showToast($msg) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            var toast = document.getElementById('toast');
            toast.textContent = '$msg';
            toast.style.visibility = 'visible';
            setTimeout(function() {
                toast.style.visibility = 'hidden';
            }, 3000);
        });
    </script>";
}
?>
