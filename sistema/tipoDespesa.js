// Abrir e fechar modal de adicionar
const btnAbrirModal = document.getElementById("btnAbrirModal");
const btnFecharModal = document.getElementById("btnFecharModal");
const modalAdicionar = document.getElementById("modalAdicionarTipoDespesa");

btnAbrirModal.addEventListener("click", () => modalAdicionar.style.display = "block");
btnFecharModal.addEventListener("click", () => modalAdicionar.style.display = "none");

window.addEventListener("click", (e) => {
    if (e.target === modalAdicionar) modalAdicionar.style.display = "none";
});

function salvarTipoDespesa() {
    const formData = new FormData(document.getElementById('formTipoDespesa'));

    fetch('backend/salvar_tipo_despesa.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data); // Exibe a mensagem de sucesso
        location.reload(); // Atualiza a página para exibir o novo tipo de despesa
    })
    .catch(error => console.error('Erro:', error));
}

function excluirTipoDespesa(id) {
    if (confirm('Tem certeza que deseja excluir este tipo de despesa?')) {
        fetch('backend/excluir_tipo_despesa.php', {
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

function editarTipoDespesa(id) {
    const novoNome = prompt('Novo nome do tipo de despesa:');
    const novaDescricao = prompt('Nova descrição:');

    if (novoNome) {
        fetch('backend/editar_tipo_despesa.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `id=${id}&nome=${novoNome}&descricao=${novaDescricao}`
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            location.reload();
        })
        .catch(error => console.error('Erro:', error));
    }
}

