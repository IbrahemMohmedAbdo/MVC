<?php

class CategoryModel
{
    private $db;

    public function __construct(mysqli $db)
    {
        $this->db = $db;
    }

    public function getAllCategories()
    {
        $result = $this->db->query("SELECT * FROM categories");
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function createCategory($name)
    {
        $stmt = $this->db->prepare("INSERT INTO categories (name) VALUES (?)");

        if (!$stmt) {
            throw new Exception("Database error: " . $this->db->error);
        }

        $stmt->bind_param("s", $name);
        $stmt->execute();

        if ($stmt->affected_rows === 0) {
            throw new Exception("Failed to create category");
        }

        return $this->db->insert_id;
    }
}
