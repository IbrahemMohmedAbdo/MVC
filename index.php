<?php
include(__DIR__ . '/config/db.php');
include(__DIR__ . '/models/ArticleModel.php');
include(__DIR__ . '/controllers/ArticleController.php');
include(__DIR__ . '/models/CategoryModel.php');
include(__DIR__ . '/controllers/CategoryController.php');  



// create Articles..
$articleModel = new ArticleModel($mysqli);
$articleController = new ArticleController($articleModel);
// create categories..
$categoryModel = new CategoryModel($mysqli);  
$categoryController = new CategoryController($categoryModel);  


$categoryFilter = isset($_GET['category']) ? $_GET['category'] : null;


if (isset($_GET['action'])) {
    $action = $_GET['action'];


    switch ($action) {

        case 'list':
            $articleController->listArticles();
            break;
        case 'create':
            $articleController->createArticle();
            break;
        case 'edit':
            $id = isset($_GET['id']) ? $_GET['id'] : null;
            $articleController->editArticle($id);
            break;
        case 'delete':
            $id = isset($_GET['id']) ? $_GET['id'] : null;
            $articleController->deleteArticle($id);
            break;
        case 'view':
            $id = isset($_GET['id']) ? $_GET['id'] : null;
            $articleController->viewArticle($id);
            break;
            case 'listCategories':
            $categoryController->listCategories();
                break;
        case 'createCategory':
            $categoryController->createCategory();
            break;
        default:
            echo "Method not implemented";
            break;
    }
}
