<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Document</title>
</head>
<body>
        <nav>
            <div class="navbar">
                <a class="page-header" href="?action=home">STC-overflow</a>
                <?php if (isset($_SESSION['username'])): ?>
                    <div class="welcome-msg">
                        Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!
                    </div>
                    <a href="?action=logout">Logout</a>
                <?php else: ?>
                    <a href="?action=login">Login</a>
                    <a href="?action=signup">Signup</a>
                <?php endif; ?>
            </div>
        </nav>
