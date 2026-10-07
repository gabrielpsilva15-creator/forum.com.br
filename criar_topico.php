
<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    echo "Você precisa estar logado para criar um tópico";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $topicos = simplexml_load_file("topicos.xml");

    $novo_topico = $topicos->addChild("topico");

    $novo_topico->addChild("titulo", $_POST['titulo']);
    $novo_topico->addChild("conteudo", $_POST['conteudo']);
    $novo_topico->addChild("autor", $_SESSION['usuario']);
    $novo_topico->addChild("mensagem", $_POST['mensagem']);

    $topicos->asXML("topicos.xml");

    echo "Tópico criado com sucesso! <a href='listar.php'>Ver tópicos</a>";

} else {
?>

<form method="POST" action="criar_topico.php">

    <label for="titulo">Post:</label>
    <input type="text" name="titulo" required><br>

    <label for="conteudo">Conteúdo:</label>
    <textarea name="conteudo" required></textarea><br>

    <label for="mensagem">Mensagem:</label>
    <textarea name="mensagem" required></textarea><br>

    <input type="submit" value="Criar Tópico">

</form>

<?php
}
?>
```