<?php
require_once __DIR__ . '\config\database.php';
require_once __DIR__ . '\controllers\AssociadoController.php';
require_once __DIR__ . '\controllers\AnuidadeController.php';
require_once __DIR__ . '\controllers\PagamentoController.php';

$page = $_GET['page'] ?? 'home';
$action = $_GET['action'] ?? '';

switch ($page) {
    case 'home':
        include 'views/home.php';
        break;

    case 'associado':
        $controller = new AssociadoController();

        if ($action === 'create') {
            $controller->create();
        } elseif ($action === 'list') {
            $controller->list();
        } elseif ($action === 'cadastrar') {
            include 'views/associado/form.php';
        } else {
            include '/views/home.php';
        }
        break;

    case 'anuidade':
        $controller = new AnuidadeController();

        if ($action === 'cadastrar') {
            include 'views/anuidade/form.php';
        } elseif ($action === 'save') {
            if ($_POST['id'] === "") {
                $controller->create();
            } else {
                $controller->update($_POST['id']);
            }
        } elseif ($action === 'list') {
            $controller->list();
        } elseif ($action === 'edit' && isset($_GET['id'])) {
            $controller->update($_GET['id']);
        } else {
            echo "Ação de anuidade inválida!";
        }
        break;

    case 'pagamento':
        $controller = new PagamentoController();

        if ($action === 'checkout' && isset($_GET['associado'])) {
            $controller->checkout($_GET['associado']);
        } elseif ($action === 'pagar'  && isset($_GET['associado'])  && isset($_GET['anuidade'])) {
            $controller->realizarPagamento($_GET['associado'], $_GET['anuidade']);
        } else {
            echo "Ação de pagamento inválida!";
        }
        break;

    default:
        echo "Página não encontrada!";
        break;
}
