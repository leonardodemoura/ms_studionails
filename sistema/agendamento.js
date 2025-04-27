// Abrir e fechar modal de adicionar
const btnAbrirModal = document.getElementById("btnAbrirModal");
const btnFecharModal = document.getElementById("btnFecharModal");
const modalAdicionar = document.getElementById("modalAdicionarAgendamento");

btnAbrirModal.addEventListener("click", () => modalAdicionar.style.display = "block");
btnFecharModal.addEventListener("click", () => modalAdicionar.style.display = "none");

window.addEventListener("click", (e) => {
    if (e.target === modalAdicionar) modalAdicionar.style.display = "none";
});

function mostrarMotivoCancelamento() {
    const statusSelect = document.getElementById('statusAgendamento');
    const motivoDiv = document.getElementById('motivoCancelamento');
    
    if (statusSelect.value === 'desmarcado') {
        motivoDiv.style.display = 'block';
    } else {
        motivoDiv.style.display = 'none';
    }
}

function salvarAgendamento() {
    const formData = new FormData(document.getElementById('formAgendamento'));

    fetch('backend/salvar_agendamento.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data); // Exibe a mensagem de sucesso
        location.reload(); // Atualiza a página para exibir o novo agendamento
    })
    .catch(error => console.error('Erro:', error));
}

function excluirAgendamento(id) {
    if (confirm('Tem certeza que deseja excluir este agendamento?')) {
        fetch('backend/excluir_agendamento.php', {
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

function editarAgendamento(id) {
    const novoCliente = prompt('Novo nome do cliente:');
    const novoTelefoneEmail = prompt('Novo telefone ou email:');
    const novoProfissional = prompt('Novo profissional responsável:');
    const novoServico = prompt('Novo serviço:');
    const novaData = prompt('Nova data (AAAA-MM-DD):');
    const novoValor = prompt('Novo valor:');
    const novoStatus = prompt('Novo status (realizado, pendente, desmarcado):');
    const novoMotivo = novoStatus === 'desmarcado' ? prompt('Motivo do cancelamento:') : '';
    const novasObservacoes = prompt('Novas observações:');

    if (novoCliente && novoTelefoneEmail && novoProfissional && novoServico && novaData && novoValor && novoStatus) {
        fetch('backend/editar_agendamento.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `id=${id}&cliente=${novoCliente}&telefoneEmail=${novoTelefoneEmail}&profissional=${novoProfissional}&servico=${novoServico}&data=${novaData}&valor=${novoValor}&status=${novoStatus}&motivo=${novoMotivo}&observacoes=${novasObservacoes}`
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            location.reload();
        })
        .catch(error => console.error('Erro:', error));
    }
}
