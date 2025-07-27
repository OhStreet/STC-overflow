<div class="page-content">
    <?php if (isset($error)): ?>
        <div class="error-msg">
            <?php echo $error ?>
        </div>
    <?php endif; ?>
    <form method="post" action="?action=login">
        <p>Login Page</p>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Login">

        <input type="checkbox" class="form-check-input" id="remember" name="remember" value="1">
        <label class="form-check-label" for="remember">Remember Me</label>
    </form>
    
</div>
