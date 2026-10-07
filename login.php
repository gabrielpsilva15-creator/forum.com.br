[<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuarios = simplexml_load_file("usuarios.xml");

    foreach ($usuarios->usuario as $u) {

        if ($u->email == $_POST['email'] && $u->senha == $_POST['senha']) {

            $_SESSION['usuario'] = (string)$u->email;

            echo "Login realizado com sucesso!";
            exit;
        }
    }

    echo "Login inválido!";

} else {
?>

<form method="post">
    email: <input type="email" name="email" required><br>
    senha: <input type="password" name="senha" required><br>
    <input type="submit" value="Login">
</form>

<?php
}
?>]