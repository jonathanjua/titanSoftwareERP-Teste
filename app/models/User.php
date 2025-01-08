<?php
namespace App\Models;
use PDO;

class User {
    private $conn;
    private $table = 'tbl_usuario';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($email, $password) {
        $query = "INSERT INTO " . $this->table . " (login, password) VALUES (:login, :password)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':login', $email);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));

        return $stmt->execute();
    }

    public function findById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findByEmail($email) {
        $query = "SELECT * FROM " . $this->table . " WHERE login = :login";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':login', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
