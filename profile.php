<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['seat_number'])) {
    header("Location: Login.html");
    exit();
}

// Array of profile images
$profileImages = [
    'profile1.png',
    'profile1.png',
    'profile1.png',
    // Add more image paths here
];

// Randomly select an image from the array
$randomImage = $profileImages[array_rand($profileImages)];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <title>Profile</title>
   
</head>
<body>

    <div class="profile-container">
        <h2>Profile Information</h2>
        
        <!-- Profile Image Section -->
        <div class="profile-image">
            <img src="<?php echo $randomImage; ?>" alt="Profile Image">
        </div>
        
        <p><strong>First Name:</strong> <?php echo $_SESSION['first_name']; ?></p>
        <p><strong>Last Name:</strong> <?php echo $_SESSION['last_name']; ?></p>
        <p><strong>Seat Number:</strong> <?php echo $_SESSION['seat_number']; ?></p>
        <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
        <p><strong>Role:</strong> <?php echo $_SESSION['role']; ?></p>
    </div>

</body>
</html>
