<?php require_once('init.php'); 

$eventos_filtrados = $_SESSION['eventos'];
 
$busca = ''; 
 
 if (isset($_GET['busca'])) { 
    $busca = $_GET['busca'];  if ($busca != '') { 
    $eventos_filtrados = array_filter( $_SESSION['eventos'], 
    function ($evento) use ($busca) { return stripos($evento['titulo'], $busca) !== false || stripos($evento['descricao'], $busca) !== false || stripos($evento['area'], $busca) !== false || stripos($evento['local'], $busca) !== false; } ); }
    } 
    ?>
<!DOCTYPE html>
<html>

<head>

    <title>Página de Eventos</title>
    <link rel="stylesheet" href="./style_index_detalhes_filtrar/index.css">
</head>

<body>

    <div class="Titulo">
        <h1>Eventos Senai</h1>
    </div>


    <div class="Procuraprincipal">
        <div class="navegacao">
         
        </div>

        <div class="digitar">
            <form action="" method="GET">
                <input type="text" name="busca" value="" placeholder="Digite o que procura...">

                <div class="botaoprocura">
                    <button type="submit">Procurar</button>
                </div>
            </form>
        </div>

        <?php

        foreach ($eventos_filtrados as $chaveEvento => $evento) {
            echo '
                <p>=================</p>
                <p>' . $evento['titulo'] . '</p>
                <p><img src="' . $evento['responsavel'] . '"></p>
                <p><a href="detalhes.php?eventoId=' . $chaveEvento . '">Saiba Mais...</a></p>
                ';
        }
        ?>

</body>

</html>