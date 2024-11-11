<?php
require_once __DIR__ . '\..\models\Anuidade.php';
require_once __DIR__ . '\..\config\database.php';

class AnuidadeController
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
            $anuidade = new Anuidade($this->db);
            $anuidade->ano = $_POST['ano'];
            $anuidade->valor = $_POST['valor'];

            if ($anuidade->cadastrar()) {
                header("Location: index.php?page=anuidade&action=list&status=success");
            } else {
                header("Location: index.php?page=anuidade&action=cadastrar&status=error");
            }
        } else {
            header("Location: index.php?page=anuidade&action=cadastrar");
        }
    }

    public function list()
    {
        $anuidade = new Anuidade($this->db);
        $anuidades = $anuidade->listar();
        include __DIR__ . '\..\views\anuidade\index.php';
    }

    public function update($id)
    {
        $anuidade_id = intval($id);
        $anuidade = new Anuidade($this->db);
        $anuidade_detalhada = $anuidade->buscarPorId($anuidade_id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $anuidade->id = $anuidade_id;
            $anuidade->ano = $_POST['ano'];
            $anuidade->valor = $_POST['valor'];

            if ($anuidade->atualizar()) {
                header("Location: index.php?page=anuidade&action=list&status=success");
            } else {
                header("Location: index.php?page=anuidade&action=cadastrar&status=error");
            }
        } else {
            include __DIR__ . '\..\views\anuidade\form.php';
        }
    }
}
