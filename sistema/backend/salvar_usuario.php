<?php
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografa a senha
    $tipo = $_POST['tipo'];
    $status = $_POST['status'];

    $sql = "INSERT INTO usuarios (nome, email, senha, tipo, status) 
            VALUES ('$nome', '$email', '$senha', '$tipo', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
