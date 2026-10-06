<?php
require_once __DIR__ . "/init.php";
require_once __DIR__ . "/controleVagas.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? null;
    $vagas = $_POST['vagas'] ?? null;

    if ($id && isset($_SESSION['eventos'][$id])) {
        
        validarNovaCapacidade($id, $vagas);

        $_SESSION['eventos'][$id]['titulo']       = $_POST['titulo'];
        $_SESSION['eventos'][$id]['descricao']    = $_POST['descricao'];
        $_SESSION['eventos'][$id]['area']         = $_POST['area'];
        $_SESSION['eventos'][$id]['data']         = $_POST['data'];
        $_SESSION['eventos'][$id]['inicio']       = $_POST['inicio'];
        $_SESSION['eventos'][$id]['fim']          = $_POST['fim'];
        $_SESSION['eventos'][$id]['local']        = $_POST['local'];
        $_SESSION['eventos'][$id]['responsavel']  = $_POST['responsavel'];
        
        $_SESSION['eventos'][$id]['vagas']        = $vagas;

        header('Location: index.php');
        exit;
    }
}
?>