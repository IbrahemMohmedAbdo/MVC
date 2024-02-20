<?php include(__DIR__ . '/../layouts/header.php');
?>
<body>
    <div class="container mt-5">
        <h1>Edit Article</h1>
        <form method="post" action="index.php?action=edit&id=<?= $article['id']; ?>" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" id="title" name="title" class="form-control" value="<?= $article['title']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content:</label>
                <textarea id="content" name="content" class="form-control" required><?= $article['content']; ?></textarea>
            </div>
       
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>