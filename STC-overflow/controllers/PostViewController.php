<?php

require_once('model/postDb.php');
require_once('model/db.php');
require_once('model/commentDb.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$postModel = new Post();
$commentModel = new Comment();

$post = $postModel->getPostById($id, $db);
$comments = $commentModel->getCommentsByPost($id, $db);


if (!$post) {
    echo "Post not found.";
    exit();
}

require 'view/post.php';

?>