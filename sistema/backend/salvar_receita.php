<?php
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $competencia = $_POST['competencia'];
    $pago_em = $_POST['pago_em'];
    $tipo_receita = $_POST['tipo_receita'];

    $sql = "INSERT INTO receitas (descricao, valor, competencia, pago_em, tipo_receita) 
            VALUES ('$descricao', '$valor', '$competencia', '$pago_em', '$tipo_receita')";

    if ($conn->query($sql) === TRUE) {
        echo "Receita cadastrada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
