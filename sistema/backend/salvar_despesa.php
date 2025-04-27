<?php
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $competencia = $_POST['competencia'];
    $pago_em = $_POST['pago_em'];
    $categoria = $_POST['categoria'];

    $sql = "INSERT INTO despesas (descricao, valor, competencia, pago_em, categoria) 
            VALUES ('$descricao', '$valor', '$competencia', '$pago_em', '$categoria')";

    if ($conn->query($sql) === TRUE) {
        echo "Despesa cadastrada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
