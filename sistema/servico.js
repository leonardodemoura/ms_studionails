// Abrir e fechar modal de adicionar
const btnAbrirModal = document.getElementById("btnAbrirModal");
const btnFecharModal = document.getElementById("btnFecharModal");
const modalAdicionar = document.getElementById("modalAdicionarServico");

btnAbrirModal.addEventListener("click", () => modalAdicionar.style.display = "block");
btnFecharModal.addEventListener("click", () => modalAdicionar.style.display = "none");

window.addEventListener("click", (e) => {
    if (e.target === modalAdicionar) modalAdicionar.style.display = "none";
});

function salvarServico() {
    const formData = new FormData(document.getElementById('formServico'));

    fetch('backend/salvar_servico.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data); // Exibe a mensagem de sucesso
        location.reload(); // Atualiza a página para exibir o novo serviço
    })
    .catch(error => console.error('Erro:', error));
}

function excluirServico(id) {
    if (confirm('Tem certeza que deseja excluir este serviço?')) {
        fetch('backend/excluir_servico.php', {
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

function editarServico(id) {
    const novoNome = prompt('Novo nome do serviço:');
    const novaDescricao = prompt('Nova descrição:');
    const novoPreco = prompt('Novo preço:');

    if (novoNome && novaDescricao && novoPreco) {
        fetch('backend/editar_servico.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `id=${id}&nome=${novoNome}&descricao=${novaDescricao}&preco=${novoPreco}`
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            location.reload();
        })
        .catch(error => console.error('Erro:', error));
    }
}
