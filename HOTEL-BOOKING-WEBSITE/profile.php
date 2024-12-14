<?php
require('./Admin/inc/essentials.php');
require('./Admin/inc/db_config.php');
session_start();

// Fetch user data dynamically
$user_id = isset($_GET['id']) ? (int)$_GET['id'] : 1; // Default to user ID 1 if not provided
$res = select("SELECT * FROM user_cred where id=?",[$user_id],'i'); 
$user = mysqli_fetch_assoc($res); 

if (!$user) {
    die("User not found.");
}
$path = USER_IMG_PATH;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .profile-picture {
            display: block;
            margin: 0 auto;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
        .profile-details {
            text-align: center;
        }
        .profile-details h1 {
            margin: 10px 0;
        }
        .profile-details p {
            margin: 5px 0;
            color: #555;
        }
    </style>
</head>
<body>

<div class="profile-container align-items-center justify-content-center">
    <img src="<?php echo htmlspecialchars($path.$user['profile']); ?>" alt="Profile Picture" class="profile" width="200px" style="position: relative; left: 200px;">
    <div class="profile-details">
        <h1><?php echo htmlspecialchars($user['name']); ?></h1>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phonenum']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($user['address']); ?></p>
        <p><strong>Pincode:</strong> <?php echo htmlspecialchars($user['pincode']); ?></p>
        <p><strong>Register Date and time :</strong> <?php echo htmlspecialchars($user['datentime']); ?></p>
        <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($user['dob']); ?></p>
    </div>
</div>

</body>
</html>
