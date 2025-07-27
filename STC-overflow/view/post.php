<div class="page-content-vert">
    <div class="post-card">
        <h3 class="post-title"><?php echo htmlspecialchars($post['title']); ?></h3>
        <p class="post-info">
            <strong>Group:</strong> <?php echo htmlspecialchars($post['forum_group']); ?>
            <strong>Author:</strong> <?php echo htmlspecialchars($post['username']); ?>
        </p>
        <p class="post-content"><?php echo htmlspecialchars($post['content']); ?></p>
    </div>
    
    <form action="?action=submit_comment" method="POST" class="comment-form">
        <input type="hidden" name="post_id" value="<?= htmlspecialchars($post['id']) ?>">
    
        <label for="content">Make a comment:</label>
        <textarea name="content" required></textarea>
    
        <input type="submit" value="Submit">
    </form>
    
    <div class="comment-container">
        <h3>Comments:</h3>
        <?php foreach ($comments as $comment): ?>
            <div class="comment">
                <p><strong><?= htmlspecialchars($comment['username']) ?>:</strong> <?= nl2br(htmlspecialchars($comment['content'])) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>