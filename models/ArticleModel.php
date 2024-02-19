<?php
class ArticleModel {
    private $db;

    public function __construct(mysqli $db) {
        $this->db = $db;
    }

    public function getAllArticles() {
        $result = $this->db->query("SELECT * FROM articles");
        if (!$result) {
            throw new Exception("Database error: " . $this->db->error);
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getArticleById($id) {
        $stmt = $this->db->prepare("SELECT * FROM articles WHERE id = ?");
        if (!$stmt) {
            throw new Exception("Database error: " . $this->db->error);
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        if (!$result) {
            throw new Exception("Database error: " . $this->db->error);
        }

        return $result->fetch_assoc();
    }

    public function createArticle($title, $content, $imagePath = null) {
        $stmt = $this->db->prepare("INSERT INTO articles (title, content,image) VALUES (?, ?, ?)");
        if (!$stmt) {
            throw new Exception("Database error: " . $this->db->error);
        }
    
        $stmt->bind_param("sss", $title, $content, $imagePath);
        $stmt->execute();
    
        if ($stmt->affected_rows === 0) {
            throw new Exception("Failed to create article");
        }
    
        return $this->db->insert_id;
    }
    public function updateArticle($id, $title, $content, $newImagePath = null) {
       
        $existingArticle = $this->getArticleById($id);
        
      
        if ($newImagePath !== null) {
         
            if (!empty($existingArticle['image'])) {
                $oldImagePath = $existingArticle['image'];
                unlink($oldImagePath);
            }
    
          
            $stmt = $this->db->prepare("UPDATE articles SET title = ?, content = ?, image = ? WHERE id = ?");
            $stmt->bind_param("sssi", $title, $content, $newImagePath, $id);
        } else {
            
            $stmt = $this->db->prepare("UPDATE articles SET title = ?, content = ? WHERE id = ?");
            $stmt->bind_param("ssi", $title, $content, $id);
        }
    
        if (!$stmt) {
            throw new Exception("Database error: " . $this->db->error);
        }
    
        $stmt->execute();
    
        if ($stmt->affected_rows === 0) {
            throw new Exception("Failed to update article");
        }
    }
    
    
    

    public function deleteArticle($id) {
        $stmt = $this->db->prepare("DELETE FROM articles WHERE id = ?");
        if (!$stmt) {
            throw new Exception("Database error: " . $this->db->error);
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();

        if ($stmt->affected_rows === 0) {
            throw new Exception("Failed to delete article");
        }
    }
}
?>
