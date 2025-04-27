// Abrir e fechar modal de adicionar
const btnAbrirModal = document.getElementById("btnAbrirModal");
const btnFecharModal = document.getElementById("btnFecharModal");
const modalAdicionar = document.getElementById("modalAdicionarProfissional");

btnAbrirModal.addEventListener("click", () => modalAdicionar.style.display = "block");
btnFecharModal.addEventListener("click", () => modalAdicionar.style.display = "none");

window.addEventListener("click", (e) => {
    if (e.target === modalAdicionar) modalAdicionar.style.display = "none";
});

function salvarProfissional() {
    const formData = new FormData(document.getElementById('formProfissional'));

    fetch('backend/salvar_profissional.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data); // Exibe a mensagem de sucesso
        location.reload(); // Atualiza a página para exibir o novo profissional
    })
    .catch(error => console.error('Erro:', error));
}

function excluirProfissional(id) {
    if (confirm('Tem certeza que deseja excluir este profissional?')) {
        fetch('backend/excluir_profissional.php', {
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

function editarProfissional(id) {
    const novoNome = prompt('Novo nome do profissional:');
    const novoCpf = prompt('Novo CPF (000.000.000-00):');
    const novoContato = prompt('Novo contato:');
    const novaEspecialidade = prompt('Nova especialidade:');
    const novaComissao = prompt('Nova comissão (%):');
    const novaDataAdmissao = prompt('Nova data de admissão (AAAA-MM-DD):');
    const novoStatus = prompt('Novo status (ativo, inativo):');

    if (novoNome && novoCpf && novoContato && novaEspecialidade && novaComissao && novaDataAdmissao && novoStatus) {
        fetch('backend/editar_profissional.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `id=${id}&nome=${novoNome}&cpf=${novoCpf}&contato=${novoContato}&especialidade=${novaEspecialidade}&comissao=${novaComissao}&dataAdmissao=${novaDataAdmissao}&status=${novoStatus}`
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            location.reload();
        })
        .catch(error => console.error('Erro:', error));
    }
}


