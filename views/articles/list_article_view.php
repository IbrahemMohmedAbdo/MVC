<?php include(__DIR__ . '/../layouts/header.php');
?>

<body>

    <section class="container">

    <div class="row justify-content-center">
    <div class="col-md-12 text-center">
        <h1> Articles </h1>

        <form method="get" action="index.php">
            <div class="row g-3 my-4">
                <div class="col-auto">
                    <select class="form-select" name="category" aria-label="Default select example">
                        <option selected>Select Category</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="index.php?action=create" class="btn btn-primary">Create Article</a>
                    <a href="index.php?action=createCategory" class="btn btn-info">Create Category</a>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach ($articles as $article) : ?>
        <div class="col">
            <div class="card h-100">
                <img src="<?= $article['image']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $article['title']; ?></h5>
                    <p class="card-text"><?= $article['content']; ?></p>
                    
                    <?php if (isset($article['category_name'])) : ?>
                        <p class="card-text">Category: <?= $article['category_name']; ?></p>
                    <?php endif; ?>

                    <a href="index.php?action=view&id=<?= $article['id']; ?>" class="btn btn-primary">View</a>
                    <a href="index.php?action=edit&id=<?= $article['id']; ?>" class="btn btn-info">Edit</a>
                    <a href="index.php?action=delete&id=<?= $article['id']; ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

    </section>


    
    <?php
    // i create a service to use pagination.... 
include(__DIR__ . '/../../services/generatePagination.php');
generatePagination($totalPages, $currentPage, $baseUrl);
?>
 


</body>

</html>