<?php

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
    $usuarios = simplexml_load_file("usuarios.xml");
    $novo_usuario = $usuarios->addChild("usuario");
    $novo_usuario->addChild("nome", $_POST['nome']);
    $novo_usuario->addChild("email", $_POST['email']);
    $novo_usuario->addChild("senha", $_POST['senha']);
    $novo_usuario->addChild("telefone", $_POST['telefone']);
$usuarios->asXML("usuarios.xml");
echo "Usuário cadastrado com sucesso!";
} else 
  

?>

<form method="POST" action="cadastro.php">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" required><br>

    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone"><br>

    <input type="submit" value="Cadastrar">
</form>