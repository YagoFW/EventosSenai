<?php
require_once __DIR__ . "/edicao.php";


$_SESSION['eventos'][$_POST['id']] = $_POST;

header('Location: index.php');
exit;
?>