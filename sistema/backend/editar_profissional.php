<?php
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $contato = $_POST['contato'];
    $especialidade = $_POST['especialidade'];
    $comissao = $_POST['comissao'];
    $data_admissao = $_POST['dataAdmissao'];
    $status = $_POST['status'];

    $sql = "UPDATE profissionais SET 
            nome='$nome', 
            cpf='$cpf', 
            contato='$contato', 
            especialidade='$especialidade', 
            comissao='$comissao',
            data_admissao='$data_admissao', 
            status='$status' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Profissional editado com sucesso!";
    } else {
        echo "Erro ao editar: " . $conn->error;
    }

    $conn->close();
}
?>
