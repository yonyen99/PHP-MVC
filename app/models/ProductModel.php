<?php
require __DIR__ . '/../../database.php';

class ProductModel
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

    function getProducts()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function createProduct($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO products (name, description, price, qty, category_id) VALUES (:name, :description, :price, :qty, :category_id)");
        $stmt->execute([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'qty' => $data['qty'],
            'category_id' => $data['category_id']
        ]);
    }

    function getProduct($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    function updateProduct($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE products SET name = :name, description = :description, price = :price, qty = :qty, category_id = :category_id WHERE id = :id");
        $stmt->execute([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'qty' => $data['qty'],
            'category_id' => $data['category_id'],
            'id' => $id
        ]);
    }

    function deleteProduct($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
    public function show($id)
    {
        $sql = "SELECT products.id, products.name, products.description, products.price, products.qty, categories.name AS category_name
            FROM products
            LEFT JOIN categories ON products.category_id = categories.id
            WHERE products.id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
