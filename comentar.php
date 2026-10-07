
<?php

session_start();

if (!isset($_SESSION['usuario'])) {
    echo "Você precisa estar logado para comentar.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $topicos = simplexml_load_file("topicos.xml");

    $id = intval($_GET['id']);

    if (isset($topicos->topico[$id])) {

        $comentario = $topicos->topico[$id]->addChild("comentario");

        $comentario->addChild("nome", $_POST['nome']);
        $comentario->addChild("mensagem", $_POST['mensagem']);

        $topicos->asXML("topicos.xml");

        header("Location: listar.php");
        exit;

    } else {

        echo "Tópico não encontrado.";
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Comentar - Fórum</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <h1>Fórum</h1>

    <nav>
        <a href="listar.php">Início</a>
        <a href="criar_topico.php">Criar Tópico</a>
        <a href="cadastro.php">Cadastro</a>
        <a href="login.php">Login</a>
    </nav>
</header>

<div class="container">

    <form method="POST" action="comentario.php?id=<?php echo $_GET['id']; ?>">

        <h2>Adicionar Comentário</h2>

        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>

        <label for="mensagem">Mensagem:</label>
        <textarea name="mensagem" required></textarea>

        <input type="submit" value="Comentar">

    </form>

</div>

<footer>
    Fórum - PHP e XML
</footer>

</body>
</html>
