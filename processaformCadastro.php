<?php

require_once 'init.php';

$eventosAntes = count($_SESSION['eventos']);
$_SESSION['eventos'][] = $_POST;
$eventosDepois = count($_SESSION['eventos']);
print_r ($_SESSION['eventos']);
 

 if($eventosDepois> $eventosAntes){
    header('location: index.php');
    exit;
 }else{
    print 'Erro ao adicionar notícia..';
 }
  