<?php
    // session_start();
    require_once('../models/user.php');
    require_once('../utils/auth_helper.php');

    require_login();

    $user_id = $_SESSION['user_id'];
    $user = get_user_by_id($user_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Online Clothing Brand</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <div class="container">
        <h2>My Profile</h2>

        <?php
        if(isset($_SESSION['profile_success'])) {
            echo "<p>" . $_SESSION['profile_success'] . "</p>";
            unset($_SESSION['profile_success']);
        }

        if(isset($_SESSION['password_success'])) {
            echo "<p>" . $_SESSION['password_success'] . "</p>";
            unset($_SESSION['password_success']);
        }
        ?>

        <p><strong>Name:</strong> <?php echo $user['user_name']; ?></p>
        <p><strong>Email:</strong> <?php echo $user['user_email']; ?></p>
        <p><strong>Address:</strong> <?php echo $user['user_address']; ?></p>
        <p><strong>Phone:</strong> <?php echo $user['user_phone']; ?></p>

        <br>
        <a href="../public/index.php?action=edit_profile">Edit Profile</a> |
        <a href="../public/index.php?action=change_password">Change Password</a> |
        <a href="../public/index.php?action=home">Back to Home</a>
    </div>
</body>
</html>