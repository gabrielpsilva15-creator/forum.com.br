
<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuarios = simplexml_load_file("usuarios.xml");

    foreach ($usuarios->usuario as $u) {

        if (
            $u->email == $_POST['email'] &&
            $u->senha == $_POST['senha']
        ) {

            $_SESSION['usuario'] = (string)$u->email;

            header("Location: listar.php");
            exit;
        }
    }

    $erro = "Login inválido!";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login - Fórum</title>
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

    <form method="POST" action="login.php">

        <h2>Login</h2>

        <?php
        if (isset($erro)) {
            echo "<p>$erro</p>";
        }
        ?>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required>

        <input type="submit" value="Entrar">

    </form>

</div>

<footer>
    Fórum - PHP e XML
</footer>

</body>
</html>
