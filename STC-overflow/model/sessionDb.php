<!-- Handles setting and destroying of current user's session -->
<?php 

function logIn($user) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
}

function logOut() {
    session_unset();
    session_destroy();
    setcookie('remember_me', '', time() - 3600, '/');
}

function getUserByToken($token, $db) {
    $stmt = $db->prepare("SELECT * FROM users WHERE remember_token = :token");
    $stmt->bindValue(':token', $token, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function setRememberToken($user_id, $token, $db) {
    $stmt = $db->prepare("UPDATE users SET remember_token = :token WHERE id = :id");
    $stmt->bindValue(':token', $token, PDO::PARAM_STR);
    $stmt->bindValue(':id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
}

?>