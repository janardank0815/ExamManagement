<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'student_db');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['add_student_btn'])) {
    $studentName = mysqli_real_escape_string($con, $_POST['studentName']);
    $seatNo = mysqli_real_escape_string($con, $_POST['seatNo']);
    $enrollmentNo = mysqli_real_escape_string($con, $_POST['enrollmentNo']);
    $phoneNumber = mysqli_real_escape_string($con, $_POST['phoneNumber']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $course = mysqli_real_escape_string($con, $_POST['course']);
    $semester = mysqli_real_escape_string($con, $_POST['semester']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $currentSubjects = mysqli_real_escape_string($con, $_POST['currentSubjects']);
    $backlogSubjects = mysqli_real_escape_string($con, $_POST['backlogSubjects']);

    $query = "INSERT INTO students1 (studentName, seatNo, enrollmentNo, phoneNumber, email, course, semester, address, dob, currentSubjects, backlogSubjects) VALUES ('$studentName', '$seatNo', '$enrollmentNo', '$phoneNumber', '$email', '$course', '$semester', '$address', '$dob', '$currentSubjects', '$backlogSubjects')";
    
    if (mysqli_query($con, $query)) {
        $_SESSION['message'] = "Student Added Successfully";
        header('Location: MainAdmin.html');
        exit(0);
    } else {
        $_SESSION['message'] = "Something went wrong";
        header('Location: index.php');
        exit(0);
    }
} else {
    header('Location: index.php');
    exit(0);
}

mysqli_close($con);
?>
