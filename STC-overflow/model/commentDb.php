<?php 

class Comment {

    function createComment($post_id, $user_id, $content, $db) {
        try {
            $stmt = $db->prepare("INSERT INTO comments (post_id, user_id, content)
                                VALUES (?, ?, ?)");
            return $stmt->execute([$post_id, $user_id, $content]);
        } catch (PDOException $e) {
            error_log("DB error: " . $e->getMessage());
            return false;
        }
    }

    function getCommentsByPost($post_id, $db) {
        try {
            $stmt = $db->prepare("
                SELECT comments.content, comments.created_at, users.username
                FROM comments
                JOIN users ON comments.user_id = users.id
                WHERE comments.post_id = ?
                ORDER BY comments.created_at ASC
            ");
            $stmt->execute([$post_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("DB error: " . $e->getMessage());
            return false;
        }
    }

}

?>