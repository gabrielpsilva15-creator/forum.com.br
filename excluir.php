
<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    echo "Você precisa estar logado para excluir um tópico";
    exit;
}

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $topicos = simplexml_load_file("topicos.xml");

    if (isset($topicos->topico[$id])) {

        $autor = (string)$topicos->topico[$id]->autor;

        if ($autor != $_SESSION['usuario']) {
            echo "Você só pode excluir seus próprios tópicos";
            exit;
        }

        unset($topicos->topico[$id]);

        $topicos->asXML("topicos.xml");

        echo "Tópico excluído com sucesso!";
        echo "<br><a href='listar.php'>Voltar para os tópicos</a>";

    } else {
        echo "Tópico não encontrado";
    }

} else {
    echo "ID do tópico não informado";
}
?>
