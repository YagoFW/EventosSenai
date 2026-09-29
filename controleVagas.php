<?php
require_once __DIR__ . "/init.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['eventos']) && is_array($_SESSION['eventos'])) {
    foreach ($_SESSION['eventos'] as $id => $evento) {
        if (!isset($_SESSION['eventos'][$id]['vagas'])) {
            $_SESSION['eventos']['$id']['vagas'] = 10;
        }
    }
}

if (!isset($_SESSION['inscritos'])) {
    $_SESSION['inscritos'] = [];
}

function contarInscritos($id_evento) {
    $total = 0;
    foreach ($_SESSION['inscritos'] as $inscricao) {
        if ($inscricao['id_evento'] == $id_evento) {
            $total++;
        }
    }
    return $total;
}


function obterVagasDisponiveis($id_evento) {
    $capacidade = $_SESSION['eventos'][$id_evento]['vagas'];
    $inscritos = contarInscritos($id_evento);
    return $capacidade - $inscritos;
}

?>

