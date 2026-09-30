<?php
require_once __DIR__ . "/init.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function contarInscritos($id_evento)
{
    $total = 0;
    $inscritos = $_SESSION['inscritos'] ?? [];
    foreach ($inscritos as $inscricao) {
        if (isset($inscricao['eventoId']) && $inscricao['eventoId'] == $id_evento) {
            $total++;
        } elseif (isset($inscricao['id_evento']) && $inscricao['id_evento'] == $id_evento) {
            $total++;
        }
    }
    return $total;
}


function obterVagasDisponiveis($id_evento)
{
    $capacidade = $_SESSION['eventos'][$id_evento]['vagas'] ?? 10;
    $inscritos = contarInscritos($id_evento);
    return $capacidade - $inscritos;
}

function validarNovaCapacidade($id_evento, $nova_capacidade)
{

    if (!filter_var($nova_capacidade, FILTER_VALIDATE_INT) || $nova_capacidade <= 0) {
        die("Erro: A capacidade precisa ser um número inteiro positivo.");
    }

    $inscritos_atuais = contarInscritos($id_evento);
    if ($nova_capacidade < $inscritos_atuais) {
        die("Erro: Não é possível reduzir a capacidade para {$nova_capacidade}, pois o evento já possui {$inscritos_atuais} inscritos.");
    }
}

function obterVagasDisponiveisInscricao($id_evento) {
    $capacidade = $_SESSION['eventos'][$id_evento]['vagas'] ?? 10;

    $total = 0;
    $inscritos = $_SESSION['inscritos'] ?? [];
    foreach ($inscritos as $inscricao) {
        if (isset($inscricao['eventoId']) && $inscricao['eventoId'] == $id_evento) {
            $total++;
        }
    }
    return $capacidade - $total;
}
