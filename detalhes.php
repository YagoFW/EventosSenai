<?php
require_once("init.php");


$eventoId = $_GET['eventoId'];

$evento = $_SESSION['eventos'][$eventoId];


?>

<html>

<head>
      <link rel="stylesheet" href="style_index_detalhes_filtrar/detalhes.css">
</head>

<body>
      <h1> Eventos Senai </h1>
      <?php require_once('nav.php');?>

      
      <h3><?php echo $evento['titulo']; ?></h3>
      <div class="informcao">
      <p><?php echo $evento['descricao']; ?></p>
      <p><?php echo $evento['area']; ?></p>
      <p><?php echo $evento['data']; ?></p>
      <p><?php echo $evento['fim']; ?></p>
      <p><?php echo $evento['inicio']; ?></p>
      <p><?php echo $evento['local']; ?></p>
      <p><?php echo $evento['responsavel']; ?></p>
      </div>

</body>