<?php
include(__DIR__ . '/config/db.php');
include(__DIR__ . '/models/ArticleModel.php');
include(__DIR__ . '/controllers/ArticleController.php');

$model = new ArticleModel($mysqli);

$controller = new ArticleController($model);
if (isset($_GET['action'])) {
    $action = $_GET['action'];


    switch ($action) {

        case 'list':
            $controller->listArticles();
            break;
        case 'create':
            $controller->createArticle();
            break;
        case 'edit':
            $id = isset($_GET['id']) ? $_GET['id'] : null;
            $controller->editArticle($id);
            break;
        case 'delete':
            $id = isset($_GET['id']) ? $_GET['id'] : null;
            $controller->deleteArticle($id);
            break;
        case 'view':
            $id = isset($_GET['id']) ? $_GET['id'] : null;
            $controller->viewArticle($id);
            break;
        default:
            echo "Method not implemented";
            break;
    }
}
