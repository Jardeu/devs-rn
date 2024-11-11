<?php
class Associado
{
    private $conn;
    private $table = "associado";

    public $id;
    public $nome;
    public $email;
    public $cpf;
    public $data_filiacao;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function cadastrar()
    {
        $query = "INSERT INTO " . $this->table . " (nome, email, cpf, data_filiacao) VALUES (:nome, :email, :cpf, :data_filiacao)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":data_filiacao", $this->data_filiacao);

        return $stmt->execute();
    }

    public function listar()
    {
        $query = "
            SELECT a.id AS associado_id, a.nome, a.email, a.cpf, a.data_filiacao,
            CASE 
                WHEN COUNT(CASE WHEN p.pago = 0 OR p.pago IS NULL THEN 1 END) > 0 THEN 'Em Atraso'
                ELSE 'Em Dia' 
            END AS status_pagamento
            FROM " . $this->table . " a
            JOIN anuidade an ON an.ano >= YEAR(a.data_filiacao)
            LEFT JOIN pagamento p ON p.associado_id = a.id AND p.anuidade_id = an.id
            GROUP BY a.id";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
