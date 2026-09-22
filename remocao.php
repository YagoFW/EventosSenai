<?php
require_once __DIR__ . "/init.php";

$id = null;
$CodigoAtual = null; 

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
    $id = $_GET['id'];
    $CodigoAtual = $_SESSION['eventos'][$id];
}
?>

<html>
    <head></head>
    <body>
        <h1>Remover Evento</h1>
        <?php require_once __DIR__ . "/nav.php"; ?>

        <ul>
            <?php foreach($_SESSION['eventos'] as $chaveEvento => $evento): ?>
                <li>
                    <a href="remocao.php?id=<?= $chaveEvento ?>">
                        <?= $evento['titulo'] ?>
                    </a>
                </li>
                <?php endforeach; ?>
        </ul>

        <?php if($id == null): ?>
            <p>Selecione uma das noticias acima</p>
        <?php else: ?>

                <form action="remocao-processa-form.php" method="POST">
                    <input type="text" name="id" id="id" value="<?= $id ?>" hidden>

        <label for="id">ID:</label>
        <input type="text" id="id" name="id" placeholder="Coloque o id" required value="<?= $CodigoAtual['id'] ?>">

        <br>
        <br>

        <label for="titulo">TÍTULO:</label>
        <input type="text" id="titulo" name="titulo" placeholder="Coloque o Título" required value="<?= $CodigoAtual['titulo'] ?>">

        <br>
        <br>

        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" placeholder="Coloque a Descrição" required value="<?= $CodigoAtual['descricao'] ?>">
        <br>
        <br>

        <label for="area">ÁREA:</label>
        <input type="text" id="area" name="area" placeholder="area" required value="<?= $CodigoAtual['area'] ?>">

        <br>
        <br>

        <label for="data">DATA:</label>
        <input type="text" id="data" name="data" placeholder="data" required value="<?= $CodigoAtual['data'] ?>">

        <br>
        <br>

        <label for="inicio">INÍCIO:</label>
        <input type="text" id="inicio" name="inicio" placeholder="inicio" required value="<?= $CodigoAtual['inicio'] ?>">
        <br>
        <br>

        <label for="fim">FIM:</label>
        <input type="text" id="fim" name="fom" placeholder="fim" required value="<?= $CodigoAtual['fim'] ?>">

        <br>
        <br>

        <label for="local">LOCAL:</label>
        <input type="text" id="local" name="local" placeholder="local" required value="<?= $CodigoAtual['local'] ?>">

        <br>
        <br>

        <label for="responsavel">RESPONSÁVEL:</label>
        <input type="text" id="responsavel" name="responsavel" placeholder="Coloque o responsavel" required value="<?= $CodigoAtual['responsavel'] ?>">
        <br>
        <br>

        <br>
        <br>
        <button type="submit">Deletar</button>



    </form>
        <?php endif ?>        

    </body>
</html>