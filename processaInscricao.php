<?php
require_once __DIR__ . "/init.php";
require_once __DIR__ . "/controleVagas.php";



if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: inscricoes.php');
}
if (!isset($_SESSION['inscritos'])) {
    $_SESSION['inscritos'] = [];
}
$nome = trim($_POST['nome']);
$email = strtolower(trim($_POST['email']));
$eventoId = $_POST['eventoEscolhido'];

$vagas = $_SESSION['eventos'][$eventoId]['vagas'] ?? 30;
$status = $_SESSION['eventos'][$eventoId]['status'] ?? "Ativo";
$erros = [];
if (empty($nome)) {
    $erros[] = "O campo nome é obrigatório.";
}
if (empty($email)) {
    $erros[] = "O campo email é obrigatório.";
}
if (!isset($_SESSION['eventos'][$eventoId])) {
    $erros[] = "O evento selecionado é inexistente.";
}
if ($status !== "Ativo") {
    $erros[] = "Não é possível se inscrever ao evento, pois o mesmo está inativo.";
}

if (obterVagasDisponiveisInscricao($eventoId) <= 0) {
    $erros[] = "Não é possível se inscrever no evento, pois a capacidade máxima de vagas foi esgotada.";
}

$total_inscritos_eventos = 0;
foreach ($_SESSION['inscritos'] as $inscrito) {
    if ($inscrito['eventoId'] == $eventoId) {
        $total_inscritos_eventos++;
    }
    if ($total_inscritos_eventos >= $vagas) {
        $erros[] = "Não é possível se inscrever no evento, pois a capacidade de vagas seria excedida";
    }
}
foreach ($_SESSION['inscritos'] as $inscrito) {
    if ($inscrito['eventoId'] == $eventoId && $inscrito['email'] == $email) {
        $erros[] = "Já existe um email inscrito nesse evento..";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processador-inscrição</title>

    <link rel="stylesheet" href="inscricoes.css">
</head>

<body>

    <h3><?php

        if (!empty($erros)) {
            foreach ($erros as $erro) {
                echo '<p class="msg_erro">', 'Erro: ' . $erro . '</p>';
                echo '<a href="inscricoes.php">Voltar à inscrição</a>';
                exit;
            }
        }
        $_SESSION['inscritos'][] = [
            'nome'     => $nome,
            'email'    => $email,
            'eventoId' => $eventoId,
        ];
        echo '<p class="msg_certo">Inscrição realizada com sucesso!</p>';
        echo '<a href="inscricoes.php">Realizar outra inscrição</a>';

        ?>
</body>

</html>
