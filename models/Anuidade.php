<?php
class Anuidade
{
    private $conn;
    private $table = "anuidade";

    public $id;
    public $ano;
    public $valor;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function cadastrar()
    {
        $query = "INSERT INTO " . $this->table . " (ano, valor) VALUES (:ano, :valor)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":ano", $this->ano);
        $stmt->bindParam(":valor", $this->valor);

        return $stmt->execute();
    }

    public function listar()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id ";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $id);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar()
    {
        $query = "UPDATE " . $this->table . " SET ano = :ano, valor = :valor WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':ano', $this->ano);
        $stmt->bindParam(':valor', $this->valor);

        return $stmt->execute();
    }
}
