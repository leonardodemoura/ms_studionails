<?php
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $cliente = $_POST['cliente'];
    $telefone_email = $_POST['telefoneEmail'];
    $profissional = $_POST['profissional'];
    $servico = $_POST['servico'];
    $data = $_POST['data'];
    $valor = $_POST['valor'];
    $status = $_POST['status'];
    $motivo_cancelamento = isset($_POST['motivo']) ? $_POST['motivo'] : null;
    $observacoes = $_POST['observacoes'];

    $sql = "UPDATE agendamentos SET 
            cliente='$cliente', 
            telefone_email='$telefone_email', 
            profissional='$profissional', 
            servico='$servico', 
            data='$data', 
            valor='$valor', 
            status='$status',
            motivo_cancelamento='$motivo_cancelamento',
            observacoes='$observacoes'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Agendamento editado com sucesso!";
    } else {
        echo "Erro ao editar: " . $conn->error;
    }

    $conn->close();
}
?>
