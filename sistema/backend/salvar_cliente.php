<?php
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $contato = $_POST['contato'];
    $cliente_desde = $_POST['clienteDesde'];
    $situacao = $_POST['situacao'];
    $endereco = $_POST['endereco'];
    $observacoes = $_POST['observacoes'];

    $sql = "INSERT INTO clientes (nome, contato, cliente_desde, situacao, endereco, observacoes) 
            VALUES ('$nome', '$contato', '$cliente_desde', '$situacao', '$endereco', '$observacoes')";

    if ($conn->query($sql) === TRUE) {
        echo "Cliente cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
