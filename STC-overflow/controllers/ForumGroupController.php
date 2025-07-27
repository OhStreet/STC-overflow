<!-- Acts as a filter. Gets all posts by forum group and renders view -->
<?php 

require_once('model/postDb.php');

$group = filter_input(INPUT_GET, 'group', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$postModel = new Post();

$posts = $postModel->getPostsByGroup($group, $db);

require 'view/home.php';

?>