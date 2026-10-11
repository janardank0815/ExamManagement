<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'student_db');

$query = "SELECT * FROM students1";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="display_students.css">
    <title>Display Students</title>
    <style>
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .student-item {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        img.profile-pic {
            max-width: 100px;
            height: auto;
            margin-right: 20px;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Student Details</h1>

        <?php
while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="student-item">';
    echo '<h2>' . $row['studentName'] . '</h2>';
    echo '<p><strong>Seat No:</strong> ' . $row['seatNo'] . '</p>';
    echo '<p><strong>Enrollment No:</strong> ' . $row['enrollmentNo'] . '</p>';
    echo '<p><strong>Phone Number:</strong> ' . $row['phoneNumber'] . '</p>';
    echo '<p><strong>Email ID:</strong> ' . $row['email'] . '</p>';
    echo '<p><strong>Course:</strong> ' . $row['course'] . '</p>';
    echo '<p><strong>Semester:</strong> ' . $row['semester'] . '</p>';
    echo '<p><strong>Student Address:</strong> ' . $row['address'] . '</p>';
    echo '<p><strong>Date of Birth:</strong> ' . $row['dob'] . '</p>';
    echo '<p><strong>Subjects of Current Semester:</strong> ' . $row['currentSubjects'] . '</p>';
    echo '<p><strong>Backlog Subjects:</strong> ' . $row['backlogSubjects'] . '</p>';
    echo '</div>';
}
?>

    </div>
</body>

</html>
