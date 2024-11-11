<?php
class Pagamento
{
    private $conn;
    private $table = "pagamento";

    public int $id;
    public int $associado_id;
    public int $anuidade_id;
    public int $pago;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function realizarPagamento()
    {
        $query = "INSERT INTO " . $this->table . " (associado_id, anuidade_id, pago) VALUES (:associado_id, :anuidade_id, 1)";

        if ($this->buscarPorAssociadoAnuidade()) {
            $query = "UPDATE " . $this->table . " SET pago = 1 WHERE associado_id = :associado_id AND anuidade_id = :anuidade_id";
        }

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":associado_id", $this->associado_id);
        $stmt->bindParam(":anuidade_id", $this->anuidade_id);

        return $stmt->execute();
    }

    public function buscarPorAssociadoAnuidade()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE associado_id = :associado_id AND anuidade_id = :anuidade_id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":associado_id", $this->associado_id);
        $stmt->bindParam(":anuidade_id", $this->anuidade_id);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function checkout($associado_id)
    {
        $query = "
            SELECT a.id AS associado_id, a.nome, a.data_filiacao, 
                an.id AS anuidade_id, an.ano, an.valor,
                SUM(CASE 
                    WHEN p.pago IS NULL OR p.pago = 0 THEN an.valor 
                    ELSE 0 
                    END) AS total_devido
            FROM associado a
            JOIN anuidade an ON an.ano >= YEAR(a.data_filiacao)
            LEFT JOIN " . $this->table . " p ON an.id = p.anuidade_id AND p.associado_id = a.id
            WHERE  a.id = :id_associado
            GROUP BY a.id, an.id
            HAVING total_devido > 0
            ORDER BY an.ano";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_associado", $associado_id);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
