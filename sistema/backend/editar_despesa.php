<?php
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $competencia = $_POST['competencia'];
    $pago_em = $_POST['pago_em'];
    $categoria = $_POST['categoria'];

    $sql = "UPDATE despesas SET 
            descricao='$descricao', 
            valor='$valor', 
            competencia='$competencia', 
            pago_em='$pago_em', 
            categoria='$categoria' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Despesa editada com sucesso!";
    } else {
        echo "Erro ao editar: " . $conn->error;
    }

    $conn->close();
}
?>
