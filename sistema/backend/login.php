<?php
session_start();
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT id, nome, senha, tipo FROM usuarios WHERE email = '$email' AND status = 'ativo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($senha, $row['senha'])) {
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['usuario_nome'] = $row['nome'];
            $_SESSION['usuario_tipo'] = $row['tipo'];

            header("Location: ../sistema.html");
            exit();
        } else {
            echo "<script>alert('Senha incorreta!'); window.location.href = '../index.html';</script>";
        }
    } else {
        echo "<script>alert('Usuário não encontrado ou inativo!'); window.location.href = '../index.html';</script>";
    }

    $conn->close();
}
?>
