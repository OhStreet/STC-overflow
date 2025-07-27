<!-- All home needs to do in the backend is get the posts -->
<?php
require_once('model/postDb.php');
require_once('model/db.php');

$postModel = new Post();
$posts = $postModel->getPosts($db);

require 'view/home.php';
?>