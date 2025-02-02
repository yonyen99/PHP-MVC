<?php
require __DIR__ . '/../../database.php';

class CategoryModel
{
    private $pdo;

    function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    function getCategories()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM categories");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function createCategory($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO categories (name, description) VALUES (:name, :description)");
        $stmt->execute([
            'name' => $data['name'],
            'description' => $data['description']
        ]);
    }

    function getCategory($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM categories WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    function updateCategory($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE categories SET name = :name, description = :description WHERE id = :id");
        $stmt->execute([
            'name' => $data['name'],
            'description' => $data['description'],
            'id' => $id
        ]);
    }

    function deleteCategory($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM categories WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
