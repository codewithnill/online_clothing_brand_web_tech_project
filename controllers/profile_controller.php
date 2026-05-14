<?php
    session_start();
    require_once('../models/user.php');
    require_once('../utils/auth_helper.php');

    require_login();

    function show_profile() {
        $user_id = $_SESSION['user_id'];
        $user = get_user_by_id($user_id);
        include('../views/profile/view.php');
    }

    function show_edit_profile() {
        $user_id = $_SESSION['user_id'];
        $user = get_user_by_id($user_id);
        include('../views/profile/edit.php');
    }

    function update_profile() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user_id = $_SESSION['user_id'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            
            if(empty($name) || empty($address) || empty($phone)) {
                $_SESSION['profile_error'] = "All fields are required!";
                header('Location: ../public/index.php?action=edit_profile');
                exit();
            }
            
            $result = update_user_profile($user_id, $name, $address, $phone);
            
            if($result) {
                $_SESSION['profile_success'] = "Profile updated successfully!";
                header('Location: ../public/index.php?action=profile');
                exit();
            } else {
                $_SESSION['profile_error'] = "Update failed!";
                header('Location: ../public/index.php?action=edit_profile');
                exit();
            }
        }
    }

    function show_change_password() {
        include('../views/profile/change_password.php');
    }

    function update_password() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user_id = $_SESSION['user_id'];
            $current_password = $_POST['current_password'];
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];
            
            $user = get_user_by_id($user_id);
            
            if(!password_verify($current_password, $user['user_password_hash'])) {
                $_SESSION['password_error'] = "Current password is incorrect!";
                header('Location: ../public/index.php?action=change_password');
                exit();
            }
            
            if($new_password != $confirm_password) {
                $_SESSION['password_error'] = "New passwords do not match!";
                header('Location: ../public/index.php?action=change_password');
                exit();
            }
            
            if(strlen($new_password) < 8) {
                $_SESSION['password_error'] = "Password must be at least 8 characters!";
                header('Location: ../public/index.php?action=change_password');
                exit();
            }
            
            $result = update_user_password($user_id, $new_password);
            
            if($result) {
                $_SESSION['password_success'] = "Password changed successfully!";
                header('Location: ../public/index.php?action=profile');
                exit();
            } else {
                $_SESSION['password_error'] = "Password change failed!";
                header('Location: ../public/index.php?action=change_password');
                exit();
            }
        }
    }
?>