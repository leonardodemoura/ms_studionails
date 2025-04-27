<?php
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $competencia = $_POST['competencia'];
    $pago_em = $_POST['pago_em'];
    $tipo_receita = $_POST['tipo_receita'];

    $sql = "UPDATE receitas SET 
            descricao='$descricao', 
            valor='$valor', 
            competencia='$competencia', 
            pago_em='$pago_em', 
            tipo_receita='$tipo_receita' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Receita editada com sucesso!";
    } else {
        echo "Erro ao editar: " . $conn->error;
    }

    $conn->close();
}
?>
