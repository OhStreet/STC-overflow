<!--Todo: 
Join users table to query to get username, in order to display them by their respective posts.
Finish deletePost
 -->
<?php
// Post class contains getters and partial CRUD for the posts table.
class Post {

    function getPosts($db) {
        try {
            $stmt = $db->prepare("SELECT posts.id, posts.user_id, users.username, posts.forum_group, posts.title, posts.content 
                                FROM posts 
                                JOIN users ON posts.user_id = users.id");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("DB error: " . $e->getMessage());
            return false;
        }
    }

    function getPostsByGroup($forum_group, $db) {
        try{
            $stmt = $db->prepare("SELECT posts.id, posts.user_id, users.username, posts.forum_group, posts.title, posts.content 
                                FROM posts
                                JOIN users ON posts.user_id = users.id  
                                WHERE forum_group = ?");
            $stmt->execute([$forum_group]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("DB error: " . $e->getMessage());
            return false;
        }
    }

    function getPostById($id, $db) {
        try {
            $stmt = $db->prepare("
                SELECT posts.id, posts.user_id, users.username, posts.forum_group, posts.title, posts.content
                FROM posts
                JOIN users ON posts.user_id = users.id
                WHERE posts.id = ?
            ");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC); // single post
        } catch (PDOException $e) {
            error_log("DB error: " . $e->getMessage());
            return false;
        }
    }


    function createPost($user_id, $forum_group, $title, $content, $db) {
        try {
            $stmt = $db->prepare("INSERT INTO posts (user_id, forum_group, title, content)
                                    VALUES(?, ?, ?, ?)"); // '?' act as placeholders to 
                                    // define structure, preventing input of raw SQL strings.
            return $stmt->execute([$user_id, $forum_group, $title, $content]); // Instead, it is bound separately here.
        } catch (PDOException $e) {
            error_log("DB error: " . $e->getMessage());
            return false;
        }
    }

    function deletePost() {

    }
}

?>