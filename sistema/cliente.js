// Abrir e fechar modal de adicionar
const btnAbrirModal = document.getElementById("btnAbrirModal");
const btnFecharModal = document.getElementById("btnFecharModal");
const modalAdicionar = document.getElementById("modalAdicionarCliente");

btnAbrirModal.addEventListener("click", () => modalAdicionar.style.display = "block");
btnFecharModal.addEventListener("click", () => modalAdicionar.style.display = "none");

window.addEventListener("click", (e) => {
    if (e.target === modalAdicionar) modalAdicionar.style.display = "none";
});

function salvarCliente() {
    const formData = new FormData(document.getElementById('formCliente'));

    fetch('backend/salvar_cliente.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data); // Exibe a mensagem de sucesso
        location.reload(); // Atualiza a página para exibir o novo cliente
    })
    .catch(error => console.error('Erro:', error));
}

function excluirCliente(id) {
    if (confirm('Tem certeza que deseja excluir este cliente?')) {
        fetch('backend/excluir_cliente.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `id=${id}`
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            location.reload();
        })
        .catch(error => console.error('Erro:', error));
    }
}

function editarCliente(id) {
    const novoNome = prompt('Novo nome do cliente:');
    const novoContato = prompt('Novo contato:');
    const novoClienteDesde = prompt('Data de início como cliente (AAAA-MM-DD):');
    const novaSituacao = prompt('Nova situação (ativo, inativo, inadimplente):');
    const novoEndereco = prompt('Novo endereço:');
    const novasObservacoes = prompt('Novas observações:');

    if (novoNome && novoContato && novoClienteDesde && novaSituacao && novoEndereco) {
        fetch('backend/editar_cliente.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `id=${id}&nome=${novoNome}&contato=${novoContato}&clienteDesde=${novoClienteDesde}&situacao=${novaSituacao}&endereco=${novoEndereco}&observacoes=${novasObservacoes}`
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            location.reload();
        })
        .catch(error => console.error('Erro:', error));
    }
}

