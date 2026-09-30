<?php
require_once __DIR__ . "/remocao.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    if (isset($_SESSION['eventos'][$id])) {
        unset($_SESSION['eventos'][$id]);
    }

    header('Location: index.php');
    exit;
}