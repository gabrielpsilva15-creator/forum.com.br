
<?php

session_start();

if (!isset($_SESSION['usuario'])) {
    echo "Você precisa estar logado para criar um tópico.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $topicos = simplexml_load_file("topicos.xml");

    $novo_topico = $topicos->addChild("topico");

    $novo_topico->addChild("titulo", $_POST['titulo']);
    $novo_topico->addChild("conteudo", $_POST['conteudo']);
    $novo_topico->addChild("mensagem", $_POST['mensagem']);
    $novo_topico->addChild("autor", $_SESSION['usuario']);

    $topicos->asXML("topicos.xml");

    header("Location: listar.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Criar Tópico - Fórum</title>
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

    <form method="POST" action="criar_topico.php">

        <h2>Criar Novo Tópico</h2>

        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required>

        <label for="conteudo">Conteúdo:</label>
        <textarea name="conteudo" required></textarea>

        <label for="mensagem">Mensagem:</label>
        <textarea name="mensagem" required></textarea>

        <input type="submit" value="Criar Tópico">

    </form>

</div>

<footer>
    Fórum - PHP e XML
</footer>

</body>
</html>
