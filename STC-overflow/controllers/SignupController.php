<?php
require_once ('model/user.php');
require_once ('model/db.php');

$userModel = new User();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password)) {
        $error = "Password must be at least 8 characters and include a number, uppercase, and lowercase letter.";
        include 'view/signup.php';
        exit();
    }


    if ($username && $email && $password) {
        try {
            // Inserts user into db
            $userModel->createUser($username, $email, $password, $db);
            $success = "Registration successful! You can now log in.";
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    } else {
        $error = "All fields are required.";
    }
    include 'view/signup.php';
} else {
    include('view/signup.php');
}

?>