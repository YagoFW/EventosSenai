<?php
require_once('init.php');

?>
<!DOCTYPE html>
<html>

<head>

    <title>Página de Eventos</title>
</head>

<body>


    <h1>Eventos Senai</h1>

    <?php
    require_once 'nav.php';


    foreach ($_SESSION['eventos'] as $chaveEvento => $evento) {
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