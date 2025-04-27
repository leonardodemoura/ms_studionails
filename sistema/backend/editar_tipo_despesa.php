<?php
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];

    $sql = "UPDATE tipos_despesas SET 
            nome='$nome', 
            descricao='$descricao' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Tipo de despesa editado com sucesso!";
    } else {
        echo "Erro ao editar: " . $conn->error;
    }

    $conn->close();
}
?>
