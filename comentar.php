```php
<?php

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
        echo "Tópico não encontrado";
    }

} else {
?>
    
<form method="POST" action="comentario.php?id=<?php echo $_GET['id']; ?>">

    <label for="nome">Nome:</label>
    <input type="text" name="nome" required>
    <br><br>

    <label for="mensagem">Mensagem:</label>
    <textarea name="mensagem" required></textarea>
    <br><br>

    <input type="submit" value="Comentar">

</form>

<?php
}
?>
```