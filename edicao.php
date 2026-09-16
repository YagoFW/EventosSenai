<?php
require_once 'init.php';

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
        <h1>- Edição</h1>

        <ul>
            <?php foreach($_SESSION['eventos'] as $chaveCodigo => $codigo): ?>
                <li>
                    <a href="edicao.php?id=<?= $chaveCodigo ?>">
                        <?= $codigo['titulo'] ?>
                    </a>
                </li>
                <?php endforeach; ?>
        </ul>

        <?php if($id == null): ?>
            <p>Selecione uma das noticias acima</p>
        <?php else: ?>
                <form method="POST">
                    <input type="text" name="id" id="id" value="<?= $id ?>" hidden>

        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" placeholder="Coloque o Título" required value="<?= $CodigoAtual['titulo'] ?>">

        <br>
        <br>

        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" placeholder="Coloque a Descrição" required value="<?= $CodigoAtual['descricao'] ?>">

        <br>
        <br>

        <label for="descricao">Area:</label>
        <input type="text" id="area" name="area" placeholder="Coloque a Area" required value="<?= $CodigoAtual['area'] ?>">

        <br>
        <br>

        <label for="descricao">Data:</label>
        <input type="text" id="data" name="data" placeholder="Coloque a Data" required value="<?= $CodigoAtual['data'] ?>">

        <br>
        <br>

        <label for="descricao">Inicio:</label>
        <input type="text" id="inicio" name="inicio" placeholder="Coloque o Início" required value="<?= $CodigoAtual['inicio'] ?>">

        <br>
        <br>

        <label for="descricao">Fim:</label>
        <input type="text" id="fim" name="fim" placeholder="Coloque o Fim" required value="<?= $CodigoAtual['fim'] ?>">

        <br>
        <br>

        <label for="descricao">Local:</label>
        <input type="text" id="local" name="local" placeholder="Coloque o Local" required value="<?= $CodigoAtual['local'] ?>">

        <br>
        <br>

        <label for="descricao">Responsavel:</label>
        <input type="text" id="responsavel" name="responsavel" placeholder="Coloque o Local" required value="<?= $CodigoAtual['responsavel'] ?>">

        <br>
        <br>




        <button type="submit">Enviar</button>



    </form>
        <?php endif ?>        

    </body>
</html>


<?php

$_SESSION['eventos'][$_POST['id']] = $_POST;

header('Location: index.php');
exit;
?>
