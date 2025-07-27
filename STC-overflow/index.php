<!--todo: add the post card component in home.php, with $posts being passed to it -->
 <!-- 
Index serves as the main router.
Routes to controllers which perform db actions, then return views (SSR).
 -->
<?php

require_once('model/db.php');
require_once('model/sessionDb.php');

session_start(); // always call at the top

if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember_me'])) {
    $token = $_COOKIE['remember_me'];
    $user = getUserByToken($token, $db);
    if ($user) {
        logIn($user);
    } else {
        setcookie('remember_me', '', time() - 3600, '/');
    }
}


$action = filter_input(INPUT_GET, "action");
if ($action === NULL) {
    $action = filter_input(INPUT_POST, "action");
    if ($action === NULL) {
        $action = "home";
    }
}
?>

<div class="layout">
  <?php include 'view/header.php'; ?>

  <?php
//   Each controller is triggered by their respective ?action= *$action* in the url.
  switch ($action) {
    case 'home':
        require 'controllers/HomeController.php';
        break;
    case 'login':
        require 'controllers/LoginController.php';
        break;
    case 'logout':
        require 'controllers/LogoutController.php';
        break;
    case 'signup':
        require 'controllers/SignupController.php';
        break;
    case 'add_post':
        require 'controllers/AddPostController.php';
        break;
    case 'submit_post':
        require 'controllers/SubmitPostController.php';
        break;
    case 'forum':
        require 'controllers/ForumGroupController.php';
        break;
    case 'view_post':
        require 'controllers/PostViewController.php';
        break;
    case 'submit_comment':
        require 'controllers/SubmitCommentController.php';
        break;
    default:
        echo "<p>Page not Found.</p>";
  }
  ?>

  <?php include 'view/footer.php'; ?>
</div>
