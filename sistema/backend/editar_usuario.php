<?php
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tipo = $_POST['tipo'];
    $status = $_POST['status'];

    $sql = "UPDATE usuarios SET 
            nome='$nome', 
            email='$email', 
            tipo='$tipo', 
            status='$status' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Usuário editado com sucesso!";
    } else {
        echo "Erro ao editar: " . $conn->error;
    }

    $conn->close();
}
?>
