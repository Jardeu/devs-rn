<?php
require_once __DIR__ . '\..\models\Pagamento.php';
require_once __DIR__ . '\..\config\database.php';

class PagamentoController
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function realizarPagamento($associado, $anuidade)
    {
        $associado_id = intval($associado);
        $anuidade_id = intval($anuidade);

        $pagamento = new Pagamento($this->db);
        $pagamento->associado_id = $associado_id;
        $pagamento->anuidade_id = $anuidade_id;

        if ($pagamento->realizarPagamento()) {
            header("Location: index.php?page=pagamento&action=checkout&associado=" . $associado_id . "&status=success");
        } else {
            header("Location: index.php?page=pagamento&action=checkout&associado=" . $associado_id . "&status=error");
        }
    }

    public function checkout($id)
    {
        $assoc_id = intval($id);
        $pagamento = new Pagamento($this->db);
        $pagamento = $pagamento->checkout($assoc_id);

        include __DIR__ . '\..\views\pagamento\checkout.php';
    }
}
