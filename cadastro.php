<?php

require_once __DIR__ . "/init.php";

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Cadastro</title>
    
    <link rel="stylesheet" href="cadastro.css">
</head>
<body>
    <div class="titulo">
    <h1> Formulário para cadastro de evento - EventosSenai</h1>
    </div>
    <div class="centerdiv">
    <div class="form">
    <form action="processaformCadastro.php" method="POST">
        <input type="text" name="id" id="id" value="<?= $_SESSION['proximo_id'] ?>" hidden>   
       <p>
        <label for="titulo">Título do evento:</label>
        <input type="text" name="titulo">
        </p>
        <p>
        <label for="descricao">Descrição do evento:</label>
        <input type="text" name="descricao">
        </p>
        <p>
        <label for="area">Área do evento: </label>
        <input type="text" name="area">
        </p>        
        <p>
        <label for="data">Data do evento:</label>
        <input type="date" name="data">
        </p>        
        <p>
        <label for="inicio">Horário de início</label>
        <input type="text" name="inicio">
        </p>        
        <label for="fim">Horário de finalização:</label>
        <input type="text" name="fim">
        </p>        
        <p>        
        <label for="local">Local do evento:</label>
        <input type="text" name="local">
        </p>        
        <p>        
        <label for="responsavel">Responsável do evento:</label>
        <input type="text" name="responsavel">
        </p>        
        <button type="submit">Enviar</button>
    </form>
    </div>
    </div>
    <div class="nav">
    <?php require_once __DIR__ . "/nav.php" ?>
    </div>
</body>
</html>