<?php
    // 

    session_start();
    require_once('../models/user.php');
    require_once('../utils/auth_helper.php');

    function show_login() { // display login form
        include('../views/auth/login.php');
    }

    function show_register() { // display registration form
        include('../views/auth/register.php');
    }

    function login() { // processing login, setting session, handling remember me
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $remember = isset($_POST['remember']) ? true : false;
            
            if(empty($email) || empty($password)) {
                $_SESSION['login_error'] = "Email and password are required!";
                header('Location: ../public/index.php?action=login');
                exit();
            }
            
            $user = login_user($email, $password);
            
            if($user) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_name'] = $user['user_name'];
                $_SESSION['user_role'] = $user['user_role'];
                
                if($remember) {
                    setcookie('remember_user_id', $user['user_id'], time() + (86400 * 30), '/');
                }
                
                if($user['user_role'] == 'admin') {
                    header('Location: ../public/index.php?action=admin_dashboard');
                } else {
                    header('Location: ../public/index.php?action=home');
                }
                exit();
            } else {
                $_SESSION['login_error'] = "Invalid email or password!";
                header('Location: ../public/index.php?action=login');
                exit();
            }
        } else {
            header('Location: ../public/index.php?action=login');
            exit();
        }
    }

    function register() {  // processing registration, validate, create user
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            
            $errors = [];
            
            if(empty($name)) $errors[] = "Name is required";
            if(empty($email)) $errors[] = "Email is required";
            if(empty($password)) $errors[] = "Password is required";
            if(strlen($password) < 8) $errors[] = "Password must be at least 8 characters";
            if(empty($address)) $errors[] = "Address is required";
            if(empty($phone)) $errors[] = "Phone is required";
            
            if(!empty($errors)) {
                $_SESSION['register_errors'] = $errors;
                header('Location: ../public/index.php?action=register');
                exit();
            }
            
            $result = register_user($name, $email, $password, $role, $address, $phone);
            
            if($result) {
                $_SESSION['register_success'] = "Registration successful! Please login.";
                header('Location: ../public/index.php?action=login');
                exit();
            } else {
                $_SESSION['register_error'] = "Email already exists!";
                header('Location: ../public/index.php?action=register');
                exit();
            }
        } else {
            header('Location: ../public/index.php?action=register');
            exit();
        }
    }

    function logout() { // destroying session and cookie
        session_destroy();
        setcookie('remember_user_id', '', time() - 3600, '/');
        header('Location: ../public/index.php?action=login');
        exit();
    }
?>