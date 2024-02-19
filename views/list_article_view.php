<?php include('layouts/header.php'); ?>

<body>

    <section class="container">

        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h1> Articles </h1>

                <form>
                    <div class="row g-3 my-4">
                        <div class="col-auto">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Select Category</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Search</button>
                            <a href="index.php?action=create" class="btn btn-primary">Create Article</a>
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
                            <a href="index.php?action=view&id=<?= $article['id']; ?>" class="btn btn-primary">View</a>
                            <a href="index.php?action=edit&id=<?= $article['id']; ?>" class="btn btn-info">Edit</a>
                            <a href="index.php?action=delete&id=<?= $article['id']; ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>
    </section>


    <?php include('layouts/nav.php'); ?>


</body>

</html>