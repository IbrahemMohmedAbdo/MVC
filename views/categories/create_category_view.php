<?php include(__DIR__ . '/../layouts/header.php');
?>

<body>
<div class="container mt-5 text-center">
    <h1 class="mb-4">Create Category</h1>
    <form method="post" action="index.php?action=createCategory">
    <div class="mb-3">
        <label for="name" class="form-label">Category Name:</label>
        <input type="text" name="name" class="form-label" id="name" required>
    </div>
        <button type="submit" class="btn btn-primary">Create Category</button>
    </form>
</div>
</body>
</html>