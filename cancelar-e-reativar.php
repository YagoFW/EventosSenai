<?php
require_once 'init.php';

$id = $_GET['id'] ?? null;
$evento = null;

if ($id !== null && isset($_SESSION['eventos'][$id])) {
    $evento = $_SESSION['eventos'][$id];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cancelar']) && isset($_SESSION['eventos'][$id])) {
        $_SESSION['eventos'][$id]['status'] = 'cancelado';
        header('Location: cancelar-e-reativar.php?id=' . $id);
        exit;
    }

    if (isset($_POST['reativar']) && isset($_SESSION['eventos'][$id])) {
        $_SESSION['eventos'][$id]['status'] = 'ativo';
        header('Location: cancelar-e-reativar.php?id=' . $id);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Status do Evento</title>
    <link rel="stylesheet" href="style_remocao_cancelar-reativar/cer.css">
</head>

<body>

    <div class="centralizaCartao">
        <h2>Lista de Eventos</h2>
        <?php require_once ('nav.php');?>
        <?php if (isset($_SESSION['eventos']) && !empty($_SESSION['eventos'])): ?>
            <ul>
                <?php foreach ($_SESSION['eventos'] as $idEvento => $eventoAtual): ?>
                    <li>
                        <strong><?php echo htmlspecialchars($eventoAtual['titulo']); ?></strong> -
                        Status: <?php echo htmlspecialchars($eventoAtual['status'] ?? 'ativo'); ?>
                        <a href="cancelar-e-reativar.php?id=<?php echo $idEvento; ?>">Alterar Status</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Nenhum evento cadastrado.</p>
        <?php endif; ?>

        <?php if ($evento !== null): ?>
            <h1>Status do Evento</h1>
            <h2><?php echo htmlspecialchars($evento['titulo']); ?></h2>

            <p>
                Status:
                <?php echo htmlspecialchars($evento['status'] ?? 'ativo'); ?>
            </p>

            <?php if (($evento['status'] ?? 'ativo') == 'ativo'): ?>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <button type="submit" name="cancelar" value="1">Cancelar evento</button>
                </form>
            <?php else: ?>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <button type="submit" name="reativar" value="1">Reativar evento</button>
                </form>
            <?php endif; ?>

            <br>
    </div>
<?php endif; ?>


<a href="index.php">Voltar</a>
</body>

</html>