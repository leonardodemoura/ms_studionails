<?php
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $sql = "UPDATE servicos SET 
            nome='$nome', 
            descricao='$descricao', 
            preco='$preco' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Serviço editado com sucesso!";
    } else {
        echo "Erro ao editar: " . $conn->error;
    }

    $conn->close();
}
?>
