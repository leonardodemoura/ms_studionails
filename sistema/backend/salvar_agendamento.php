<?php
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente = $_POST['cliente'];
    $telefone_email = $_POST['telefoneEmail'];
    $profissional = $_POST['profissional'];
    $servico = $_POST['servico'];
    $data = $_POST['data'];
    $valor = $_POST['valor'];
    $status = $_POST['status'];
    $motivo_cancelamento = isset($_POST['motivo']) ? $_POST['motivo'] : null;
    $observacoes = $_POST['observacoes'];

    $sql = "INSERT INTO agendamentos (cliente, telefone_email, profissional, servico, data, valor, status, motivo_cancelamento, observacoes) 
            VALUES ('$cliente', '$telefone_email', '$profissional', '$servico', '$data', '$valor', '$status', '$motivo_cancelamento', '$observacoes')";

    if ($conn->query($sql) === TRUE) {
        echo "Agendamento cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
