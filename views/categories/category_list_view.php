<?php include(__DIR__ . '/../layouts/header.php');
?>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Category List</h1>

    <ul class="list-group">
        <?php foreach ($categories as $category): ?>
            <li class="list-group-item"><?= $category['name']; ?></li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>