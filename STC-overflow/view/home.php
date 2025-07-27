<div class="wrapper">
    <div class="forum-container">
        <h3>Forums</h3>
        <form method="GET">
            <input type="hidden" name="action" value="forum">
            <button type="submit" name="group" value="C# and .NET">C# and .NET</button>
        </form>

        <form method="GET">
            <input type="hidden" name="action" value="forum">
            <button type="submit" name="group" value="Web Development">Web Development</button>
        </form>

        <form method="GET">
            <input type="hidden" name="action" value="forum">
            <button type="submit" name="group" value="Databases">Databases</button>
        </form>

        <form method="GET">
            <input type="hidden" name="action" value="home">
            <button type="submit">All Posts</button>
        </form>
    </div>

    
    <div class="main-content">
        <div class="add-post-btn">
            <a class="add-post-btn" href="?action=add_post">ADD POST</a>
        </div>
        <div class="post-container">
            <!-- $posts is prepared in the Home and ForumGroup controllers -->
            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <div class="post-card">
                        <h3 class="post-title">
                        <a href="?action=view_post&id=<?= urlencode($post['id']) ?>">
                            <?= htmlspecialchars($post['title']) ?>
                        </a>
                        </h3>
                        <p class="post-info">
                            <strong>Group:</strong> <?php echo htmlspecialchars($post['forum_group']); ?>
                            <strong>Author:</strong> <?php echo htmlspecialchars($post['username']); ?>
                        </p>
                        <p class="post-content"><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>  <!-- nl2br: easy line breaks -->
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No posts yet.</p>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="resources">
        <h3>Resources</h3>
        <a href="https://www.w3schools.com/">w3schools</a>
    </div>
</div>
