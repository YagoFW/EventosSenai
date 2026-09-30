<?php

require_once __DIR__ . "/init.php";
require_once __DIR__ . "/controleVagas.php";

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário-Inscrição</title>

    <link rel="stylesheet" href="inscricoes.css">
</head>

<body>
    <div class="titulo">
        <h1>Inscrições para os eventos</h1>
    </div>
    <div class="centralizaForm">
        <div class="form">
            <form action="processaInscricao.php" method="POST">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required>
                <br><br>
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" required>
                <br><br>
                <select name="eventoEscolhido" id="eventoEscolhido" required>
                    <option value="">Selecione o evento</option>
                    <?php foreach ($_SESSION['eventos'] as $chaveEvento => $evento):
                        $vagas_restantes = obterVagasDisponiveisInscricao($chaveEvento);
                        $lotado = $vagas_restantes <= 0 ? 'disabled' : '';
                        $texto_vagas = $vagas_restantes <= 0 ? '(LOTADO)' : "({$vagas_restantes} vagas restantes)";
                    ?>
                        <option value="<?= htmlspecialchars($chaveEvento) ?>" <?= $lotado ?>>
                            <?= htmlspecialchars($evento['titulo']) ?> <?= $texto_vagas ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <button type="reset">Limpar</button>
                <button type="submit">Submeter</button>
            </form>
        </div>
    </div>
    <div class="nav">
        <?php require_once __DIR__ . "/nav.php"; ?>
    </div>
</body>
</html>