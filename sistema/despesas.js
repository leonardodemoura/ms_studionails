// Abrir e fechar modal de adicionar
const btnAbrirModal = document.getElementById("btnAbrirModal");
const btnFecharModal = document.getElementById("btnFecharModal");
const modalAdicionar = document.getElementById("modalAdicionarDespesa");

btnAbrirModal.addEventListener("click", () => modalAdicionar.style.display = "block");
btnFecharModal.addEventListener("click", () => modalAdicionar.style.display = "none");

window.addEventListener("click", (e) => {
    if (e.target === modalAdicionar) modalAdicionar.style.display = "none";
});

function salvarDespesa() {
    const formData = new FormData(document.getElementById('formDespesa'));

    fetch('backend/salvar_despesa.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data); // Exibe a mensagem de sucesso
        location.reload(); // Atualiza a página para exibir a nova despesa
    })
    .catch(error => console.error('Erro:', error));
}

function excluirDespesa(id) {
    if (confirm('Tem certeza que deseja excluir esta despesa?')) {
        fetch('backend/excluir_despesa.php', {
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

function editarDespesa(id) {
    const novaDescricao = prompt('Nova descrição:');
    const novoValor = prompt('Novo valor:');
    const novaCompetencia = prompt('Nova competência (AAAA-MM):');
    const novoPagoEm = prompt('Nova data de pagamento (AAAA-MM-DD):');
    const novaCategoria = prompt('Nova categoria (fornecedores, contas, materiais, outros):');

    if (novaDescricao && novoValor && novaCompetencia && novoPagoEm && novaCategoria) {
        fetch('backend/editar_despesa.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `id=${id}&descricao=${novaDescricao}&valor=${novoValor}&competencia=${novaCompetencia}&pago_em=${novoPagoEm}&categoria=${novaCategoria}`
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            location.reload();
        })
        .catch(error => console.error('Erro:', error));
    }
}
