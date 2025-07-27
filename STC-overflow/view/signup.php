<div class="page-content">
<!-- Displaying error/success -->
    <?php if (isset($error)): ?>
        <div class="error-msg">
            <?php echo $error ?>
        </div>
    <?php endif; ?>
    <?php if (isset($success)):?>
        <div class="success-msg">
            <?php echo $success ?>
        </div>
    <?php endif; ?>
    <form method="post" action="?action=signup">
        <p>Signup Page</p>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Register">
    </form>
    
</div>
