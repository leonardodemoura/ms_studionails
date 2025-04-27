// Abrir e fechar modal de adicionar
const btnAbrirModal = document.getElementById("btnAbrirModal");
const btnFecharModal = document.getElementById("btnFecharModal");
const modalAdicionar = document.getElementById("modalAdicionarTipoReceita");

btnAbrirModal.addEventListener("click", () => modalAdicionar.style.display = "block");
btnFecharModal.addEventListener("click", () => modalAdicionar.style.display = "none");

window.addEventListener("click", (e) => {
    if (e.target === modalAdicionar) modalAdicionar.style.display = "none";
});

function salvarTipoReceita() {
    const formData = new FormData(document.getElementById('formTipoReceita'));

    fetch('backend/salvar_tipo_receita.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data); // Exibe a mensagem de sucesso
        location.reload(); // Atualiza a página para exibir o novo tipo de receita
    })
    .catch(error => console.error('Erro:', error));
}

function excluirTipoReceita(id) {
    if (confirm('Tem certeza que deseja excluir este tipo de receita?')) {
        fetch('backend/excluir_tipo_receita.php', {
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

function editarTipoReceita(id) {
    const novoNome = prompt('Novo nome do tipo de receita:');
    const novaDescricao = prompt('Nova descrição:');

    if (novoNome) {
        fetch('backend/editar_tipo_receita.php', {
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

