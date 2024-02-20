<?php

class CategoryController {
    private $model;

    public function __construct(CategoryModel $model) {
        $this->model = $model;
    }

    public function listCategories() {
        $categories = $this->model->getAllCategories();
        include 'views/categories/category_list_view.php';
    }

    public function createCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $name = $_POST['name'];

                $this->model->createCategory($name);

                header('Location: index.php?action=listCategories');
                exit;
            } catch (Exception $e) {
                // Handle the exception (e.g., log it, show an error message)
                echo "Error: " . $e->getMessage();
            }
        } else {
            include 'views/categories/create_category_view.php';
        }
    }
}