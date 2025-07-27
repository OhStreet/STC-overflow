<?php 
require_once('model/db.php');
require_once('model/postDb.php');
require_once('model/user.php');
require_once('model/commentDb.php');

$commentModel = new Comment();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post_id = filter_input(INPUT_POST, 'post_id', FILTER_SANITIZE_NUMBER_INT);
    $user_id = $_SESSION['user_id'] ?? null;
    $content = trim($_POST['content']);


    if ($post_id && $user_id && $content) {
        $success = $commentModel->createComment($post_id, $user_id, $content, $db);
        if ($success) {
            header("Location: index.php?action=view_post&id=" . urlencode($post_id));
            exit();
        } else {
            echo "Comment failed to save.";
        }
    } else {
        echo "Missing required fields.";
    }
}
?>