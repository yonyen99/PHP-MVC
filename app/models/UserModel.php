<?php
require __DIR__ . '/../../database.php';
class UserModel
{
    private $pdo;
    function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }
    function getUsers()
    {
        $stmt = $this->pdo->prepare("SELECT *FROM users");
        $stmt->execute();
        $users = $stmt->fetchAll();
        return $users;
    }

    function createUser($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (name) VALUES (:name)");
        $stmt->execute([
            'name' => $data['name'],
        ]);
    }

    function getUser($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch();
        return $user;
    }
    function updateUser($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE users SET name = :name WHERE id = :id");
        $stmt->execute([
            'name' => $data['name'],
            'id' => $id
        ]);
    }
    function deleteUser($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
