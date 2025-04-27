<?php
include 'conecta.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM despesas WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Despesa excluída com sucesso!";
    } else {
        echo "Erro ao excluir: " . $conn->error;
    }

    $conn->close();
}
?>
