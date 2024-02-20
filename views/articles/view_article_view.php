<?php include(__DIR__ . '/../layouts/header.php');
?>
<body>
    <div class="container mt-5">
    <h1> View Article </h1>
        <?php if ($article): ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $article['title']; ?></h5>
                    <p class="card-text"><?= $article['content']; ?></p>
                    <?php if (!empty($article['image'])): ?>
                        <img src="<?= $article['image']; ?>" class="img-fluid" alt="Article Image">
                    <?php else: ?>
                        <p>No image available</p>
                    <?php endif; ?>
                </div>
            </div>
        <?php else: ?>
            <p>Article not found.</p>
        <?php endif; ?>

        <a href="index.php?action=list" class="btn btn-primary mt-3">Back to List</a>
    </div>
</body>
</html>
