<?php
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $contato = $_POST['contato'];
    $especialidade = $_POST['especialidade'];
    $comissao = $_POST['comissao'];
    $data_admissao = $_POST['dataAdmissao'];
    $status = $_POST['status'];

    $sql = "INSERT INTO profissionais (nome, cpf, contato, especialidade, comissao, data_admissao, status) 
            VALUES ('$nome', '$cpf', '$contato', '$especialidade', '$comissao', '$data_admissao', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "Profissional cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
