<!-- Handles post requests for submitting posts -->
<!-- Todo: Add error displays -->
<?php 
require_once('model/postDb.php');
require_once ('model/user.php');
require_once ('model/db.php');

$postModel = new Post();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'] ?? null;
    $forum_group = trim($_POST['forum_group']);
    $content = trim($_POST['content']);
    $title = trim($_POST['title']);

    if ($user_id && $forum_group && $title && $content) {
        $post = $postModel->createPost($user_id, $forum_group, $title, $content, $db);
        if ($post) {
            header("Location: index.php"); // Change redirect later
            exit();
        } else {
            $error = "Please fill out all fields.";
        }
    } else {
        $error = "Please fill out all fields.";
    }
}
require 'view/addPost.php';
?>