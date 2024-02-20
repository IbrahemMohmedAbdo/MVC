<?php
class ArticleController
{
    private $model;

    public function __construct(ArticleModel $model)
    {
        $this->model = $model;
    }

    public function listArticles($categoryFilter = null)
    {
        try {

            $articles = $this->model->getArticles($categoryFilter);


            $categories = $this->model->getCategories();


            include(__DIR__ . '/../views/articles/list_article_view.php');
        } catch (Exception $e) {

            echo "Error: " . $e->getMessage();
        }
    }
    public function createArticle()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $categoryId = $_POST['category'];

                $uploadDir = 'uploads/';
                $uploadedFile = $uploadDir . basename($_FILES['image']['name']);

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFile)) {
                    $imagePath = $uploadedFile;

                    $this->model->createArticle($title, $content, $imagePath, $categoryId);

                    header('Location: index.php?action=list');
                    exit;
                } else {
                    throw new Exception("Failed to upload image.");
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            try {

                $categories = $this->model->getCategories();
                include(__DIR__ . '/../views/articles/create_article_view.php');
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }


    public function viewArticle($id)
    {
        $article = $this->model->getArticleById($id);
        include(__DIR__ . '/../views/articles/view_article_view.php');
    }




    public function editArticle($id)
    {
        $this->processArticleForm($id, 'articles/edit_article_view.php');
    }

    public function updateArticle($id)
    {
        $this->processArticleForm($id, 'articles/edit_article_view.php');
    }

    private function processArticleForm($id, $view)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $title = $_POST['title'];
                $content = $_POST['content'];


                if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = 'uploads/';
                    $uploadedFile = $uploadDir . basename($_FILES['image']['name']);

                    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFile)) {

                        $imagePath = $uploadedFile;
                        $this->model->updateArticle($id, $title, $content, $imagePath);
                    } else {
                        throw new Exception("Failed to upload new image.");
                    }
                } else {

                    $this->model->updateArticle($id, $title, $content);
                }

                header('Location: index.php?action=list');
                exit;
            } catch (Exception $e) {

                echo "Error: " . $e->getMessage();
            }
        } else {

            $article = $this->model->getArticleById($id);
            include(__DIR__ . '/../views/' . $view);
        }
    }


    public function deleteArticle($id)
    {
        try {
            $this->model->deleteArticle($id);
            header('Location: index.php?action=list');
            exit;
        } catch (Exception $e) {

            echo "Error: " . $e->getMessage();
        }
    }
}
