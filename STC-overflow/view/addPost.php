<!-- Forum groups are hardcoded for now -->
<div class="page-content-vert">
    <form action="?action=submit_post" method="POST" class="add-post-form">
        <label for="forum_group">Select Group:</label>
        <select name="forum_group" id="forum_group">
            <option value="Web Development">Web Development</option>
            <option value="Databases">Databases</option>
            <option value="C# and .NET">C# and .NET</option>
        </select>
    
        <label for="title">Title:</label>
        <input type="text" name="title" required>
    
        <label for="content">Content:</label>
        <textarea name="content" required></textarea>
    
        <input type="submit" value="Post">
    </form>
</div>
