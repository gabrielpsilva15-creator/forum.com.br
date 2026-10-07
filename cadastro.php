
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuarios = simplexml_load_file("usuarios.xml");

    $novo_usuario = $usuarios->addChild("usuario");

    $novo_usuario->addChild("nome", $_POST['nome']);
    $novo_usuario->addChild("email", $_POST['email']);
    $novo_usuario->addChild("senha", $_POST['senha']);
    $novo_usuario->addChild("telefone", $_POST['telefone']);

    $usuarios->asXML("usuarios.xml");

    echo "<div class='mensagem'>Usuário cadastrado com sucesso!</div>";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro - Fórum</title>
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

    <form method="POST" action="cadastro.php">

        <h2>Criar Cadastro</h2>

        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone">

        <input type="submit" value="Cadastrar">

    </form>

</div>

<footer>
    Fórum - PHP e XML
</footer>

</body>
</html>
