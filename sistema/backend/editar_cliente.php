<?php
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $contato = $_POST['contato'];
    $cliente_desde = $_POST['clienteDesde'];
    $situacao = $_POST['situacao'];
    $endereco = $_POST['endereco'];
    $observacoes = $_POST['observacoes'];

    $sql = "UPDATE clientes SET 
            nome='$nome', 
            contato='$contato', 
            cliente_desde='$cliente_desde', 
            situacao='$situacao', 
            endereco='$endereco',
            observacoes='$observacoes' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Cliente editado com sucesso!";
    } else {
        echo "Erro ao editar: " . $conn->error;
    }

    $conn->close();
}
?>
