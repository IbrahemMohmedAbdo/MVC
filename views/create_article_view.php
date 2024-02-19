<?php include('layouts/header.php'); ?>

<body>
   
    <div class="container mt-5 text-center">
        <h1 class="mb-4">Create Article</h1>
        <form action="index.php?action=create" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content:</label>
                <textarea class="form-control" name="content" id="content" required></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input class="form-control" type="file" name="image" id="image" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</body>
</html>
