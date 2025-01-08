<?php
namespace App\Models;
use PDO;

class Employee
{
    private $conn;
    private $table = 'tbl_funcionario';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $cpf, $email, $rg, $id_empresa)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE email = :email OR cpf = :cpf";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return false;
        }

        $query = "INSERT INTO " . $this->table . " (nome, cpf, email, rg, id_empresa) VALUES (:nome, :cpf, :email,:rg, :id_empresa)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nome', $name);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':id_empresa', $id_empresa);

        return $stmt->execute();
    }

    public function findById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $cpf, $email, $rg, $id_empresa)
    {
        $query = "UPDATE " . $this->table . " SET name = :name, cpf = :cpf, email = :email, rg = :rg, id_empresa = :id_empresa WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':id_empresa', $id_empresa);

        return $stmt->execute();
    }

    public function delete($id_empresa)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_empresa = :id_empresa";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_empresa', $id_empresa);
        return $stmt->execute();
    }

    public function getCompanyName($id_empresa)
    {
        $query = "SELECT c.nome FROM tbl_empresa c
                  JOIN " . $this->table . " e ON e.id_empresa = c.id_empresa
                  WHERE e.id_empresa = :id_empresa";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_empresa', $id_empresa);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}