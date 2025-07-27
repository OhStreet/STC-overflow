<?php
// User class holds getters and partial CRUD for the users table.
// See postDb for how injection handling is involved.
class User {
    
    function getUser($username, $password, $db) {
        try {
            $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                return $user;
            }

            return false;
        } catch (PDOException $e) {
            error_log("DB error: " . $e->getMessage());
            return false;
        }
    }


    function createUser($username, $email, $password, $db) {
        try {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            return $stmt->execute([$username, $email, $hash]);
        } catch (PDOException $e) {
            // Check if it's a duplicate entry error -- Borrowed from group project
            if ($e->getCode() == 23000) {
                if (strpos($e->getMessage(), 'email') !== false) {
                    throw new Exception("Email address is already registered.");
                } else {
                    throw new Exception("Username is already taken.");
                }
            } else {
                throw new Exception("Registration failed. Please try again.");
            }
        }
    }
}

?>