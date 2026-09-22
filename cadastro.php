<?php

require_once __DIR__ . "/init.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <form method="POST">
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
        <label for="horarioInicio">Horário de início</label>
        <input type="text" name="inicio">
        </p>        
        <label for="horarioFim">Horário de finalização:</label>
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
    <?php 

        require_once 'init.php';

        $eventoAntes = count($_SESSION['eventos']);
        $_SESSION['noticias'][] = $_POST;
        $eventoDepois = count($_SESSION['eventos']);
        print_r ($_SESSION['eventos']);
 

        if($eventoDepois> $eventoAntes){
            header('location: index.php');
            exit;
        }else{
            print 'Erro ao adicionar notícia..';
        }
    ?>    
</body>
</html>