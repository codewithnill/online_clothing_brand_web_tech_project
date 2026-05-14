<?php
    session_start();
    require_once('../../models/user.php');
    require_once('../../utils/auth_helper.php');

    require_login();

    $user_id = $_SESSION['user_id'];
    $user = get_user_by_id($user_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Online Clothing Brand</title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Profile</h2>

        <?php
            if(isset($_SESSION['profile_error'])) {
                echo "<p>" . $_SESSION['profile_error'] . "</p>";
                unset($_SESSION['profile_error']);
            }
        ?>

        <form method="POST" action="../../public/index.php?action=update_profile">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $user['user_name']; ?>" required> <br><br>

            <label>Address:</label>
            <textarea name="address" required><?php echo $user['user_address']; ?></textarea> <br><br>

            <label>Phone:</label>
            <input type="text" name="phone" value="<?php echo $user['user_phone']; ?>" required> <br><br>

            <input type="submit" value="Update Profile">
        </form>

        <br>
        <a href="../../public/index.php?action=profile">Back to Profile</a>
    </div>
</body>
</html>