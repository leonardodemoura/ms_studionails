// Abrir e fechar modal de adicionar
const btnAbrirModal = document.getElementById("btnAbrirModal");
const btnFecharModal = document.getElementById("btnFecharModal");
const modalAdicionar = document.getElementById("modalAdicionarReceita");

btnAbrirModal.addEventListener("click", () => modalAdicionar.style.display = "block");
btnFecharModal.addEventListener("click", () => modalAdicionar.style.display = "none");

window.addEventListener("click", (e) => {
    if (e.target === modalAdicionar) modalAdicionar.style.display = "none";
});

// Abrir e fechar modal de filtro
const btnAbrirFiltro = document.getElementById("btnAbrirFiltro");
const btnFecharFiltro = document.getElementById("btnFecharFiltro");
const modalFiltro = document.getElementById("modalFiltroReceitas");

btnAbrirFiltro.addEventListener("click", () => modalFiltro.style.display = "block");
btnFecharFiltro.addEventListener("click", () => modalFiltro.style.display = "none");

window.addEventListener("click", (e) => {
    if (e.target === modalFiltro) modalFiltro.style.display = "none";
});

function salvarReceita() {
    const formData = new FormData(document.getElementById('formReceita'));

    fetch('backend/salvar_receita.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data); // Mostra a mensagem do PHP num alert
        location.reload(); // Atualiza a página pra exibir a nova receita
    })
    .catch(error => console.error('Erro:', error));
}


function excluirReceita(id) {
    if (confirm('Tem certeza que deseja excluir esta receita?')) {
        fetch('backend/excluir_receita.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `id=${id}`
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            location.reload(); // Atualiza a página pra remover a receita excluída
        })
        .catch(error => console.error('Erro:', error));
    }
}

function editarReceita(id) {
    const novaDescricao = prompt('Nova descrição:');
    const novoValor = prompt('Novo valor:');
    const novaCompetencia = prompt('Nova competência (AAAA-MM):');
    const novoPagoEm = prompt('Nova data de pagamento (AAAA-MM-DD):');
    const novoTipo = prompt('Novo tipo de receita (servico, produto, outro):');

    if (novaDescricao && novoValor && novaCompetencia && novoPagoEm && novoTipo) {
        fetch('backend/editar_receita.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `id=${id}&descricao=${novaDescricao}&valor=${novoValor}&competencia=${novaCompetencia}&pago_em=${novoPagoEm}&tipo_receita=${novoTipo}`
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            location.reload();
        })
        .catch(error => console.error('Erro:', error));
    }
}
