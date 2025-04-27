<?php
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];

    $sql = "INSERT INTO tipos_despesas (nome, descricao) VALUES ('$nome', '$descricao')";

    if ($conn->query($sql) === TRUE) {
        echo "Tipo de despesa cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
