<?php
require_once __DIR__ . "/init.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['eventos']) && is_array($_SESSION['eventos'])) {
    foreach ($_SESSION['eventos'] as $id => $evento) {
        if (!isset($_SESSION['eventos'][$id]['capacidade_maxima'])) {
            $_SESSION['eventos']['$id']['capacidade_maxima'] = 10;
        }
    }
}

if (!isset($_SESSION['inscricoes'])) {
    $_SESSION['inscricoes'] = [];
}

function contarInscritos($id_evento) {
    $total = 0;
    foreach ($_SESSION['inscricoes'] as $inscricao) {
        if ($inscricao['id_evento'] == $id_evento) {
            $total++;
        }
    }
    return $total;
}

