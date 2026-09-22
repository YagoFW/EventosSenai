<?php
require_once("init.php");

$eventoId = $_GET['eventoId'];

$evento = $_SESSION ['eventos'][$eventoId];

?>

<html>
<body>
      <h1> Eventos Senai </h1>

      <h3><?php echo $evento['titulo']; ?></h3>
      <p><?php echo $evento['descricao']; ?></p>
      <p><?php echo $evento['area']; ?></p>
      <p><?php echo $evento['data']; ?></p>
      <p><?php echo $evento['fim']; ?></p>
      <p><?php echo $evento['inicio']; ?></p>
      <p><?php echo $evento['local']; ?></p>
      <p><?php echo $evento['responsavel']; ?></p>

</body>