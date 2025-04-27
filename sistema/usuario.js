// Abrir e fechar modal de adicionar
const btnAbrirModal = document.getElementById("btnAbrirModal");
const btnFecharModal = document.getElementById("btnFecharModal");
const modalAdicionar = document.getElementById("modalAdicionarUsuario");

btnAbrirModal.addEventListener("click", () => modalAdicionar.style.display = "block");
btnFecharModal.addEventListener("click", () => modalAdicionar.style.display = "none");

window.addEventListener("click", (e) => {
    if (e.target === modalAdicionar) modalAdicionar.style.display = "none";
});

function salvarUsuario() {
    const formData = new FormData(document.getElementById('formUsuario'));

    fetch('backend/salvar_usuario.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data); // Exibe a mensagem de sucesso
        location.reload(); // Atualiza a página para exibir o novo usuário
    })
    .catch(error => console.error('Erro:', error));
}

function excluirUsuario(id) {
    if (confirm('Tem certeza que deseja excluir este usuário?')) {
        fetch('backend/excluir_usuario.php', {
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

function editarUsuario(id) {
    const novoNome = prompt('Novo nome do usuário:');
    const novoEmail = prompt('Novo email:');
    const novoTipo = prompt('Novo tipo (admin ou funcionario):');
    const novoStatus = prompt('Novo status (ativo ou inativo):');

    if (novoNome && novoEmail && novoTipo && novoStatus) {
        fetch('backend/editar_usuario.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `id=${id}&nome=${novoNome}&email=${novoEmail}&tipo=${novoTipo}&status=${novoStatus}`
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            location.reload();
        })
        .catch(error => console.error('Erro:', error));
    }
}
