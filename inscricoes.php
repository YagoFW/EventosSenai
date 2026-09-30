<?php

require_once __DIR__ . "/init.php";
require_once __DIR__ . "/nav.php";

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário-Inscrição</title>
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
            <?php foreach($_SESSION['eventos'] as $chaveEvento => $evento):?>
            <option value="<?= htmlspecialchars($chaveEvento) ?>"><?= htmlspecialchars($evento['titulo']) ?></option>
            <?php endforeach; ?>
        </select> 
        <button type="reset">Limpar</button>
        <button type="submit">Submeter</button>
    </form>
    </div>
    </div>
</body>
</html>
