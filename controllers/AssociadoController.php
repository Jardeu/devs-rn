<?php
require_once __DIR__ . '\..\models\Associado.php';
require_once __DIR__ . '\..\config\database.php';

class AssociadoController
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $associado = new Associado($this->db);
            $associado->nome = $_POST['nome'];
            $associado->email = $_POST['email'];
            $associado->cpf = $_POST['cpf'];
            $associado->data_filiacao = $_POST['data_filiacao'];

            if ($associado->cadastrar()) {
                header("Location: index.php?page=associado&action=list&status=success");
            } else {
                header("Location: index.php?page=associado&action=cadastrar&status=error");
            }
        } else {
            header("Location: index.php?page=associado&action=cadastrar");
        }
    }

    public function list()
    {
        $associado = new Associado($this->db);
        $associados = $associado->listar();

        include __DIR__ . '\..\views\associado\index.php';
    }
}
