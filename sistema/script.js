// script.js
document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.querySelector('.toggle'); // Botão para abrir/fechar a barra lateral
    const barraLateral = document.querySelector('.barra_lateral'); // Barra lateral
    const textoLogo = document.querySelector('.texto_logo'); // Texto com o nome e cargo
    const conteudo = document.querySelector('.dashboard'); // Conteúdo principal

    toggleButton.addEventListener('click', () => {
        barraLateral.classList.toggle('fechada'); // Alterna a classe 'fechada' na barra lateral

        // Controla a visibilidade do nome e cargo
        if (barraLateral.classList.contains('fechada')) {
            textoLogo.style.display = 'none'; // Esconde o nome e cargo
            conteudo.style.marginLeft = '70px'; // Ajusta o conteúdo para acompanhar a barra lateral fechada
        } else {
            textoLogo.style.display = 'flex'; // Mostra o nome e cargo
            conteudo.style.marginLeft = '250px'; // Ajusta o conteúdo para acompanhar a barra lateral aberta
        }
    });
});





