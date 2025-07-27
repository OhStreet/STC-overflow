<!-- Handles post requests for a user logging in -->
<?php
require_once ('model/user.php');
require_once ('model/db.php');
require_once ('model/sessionDb.php');

$userModel = new User();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $remember = filter_input(INPUT_POST, 'remember', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if ($username && $password) {
        $user = $userModel->getUser($username, $password, $db);
        if ($user) {
            if ($remember) {
                $token = bin2hex(random_bytes(16));
                setRememberToken($user['id'], $token, $db);
                setcookie('remember_me', $token, time() + (86400 * 30), '/');
            }
            logIn($user);
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid credentials.";
        }
    } else {
        $error = "Please fill out all fields.";
    }
}

require 'view/login.php';
?>