const hamburgerMenu = document.getElementById('hamburger-menu');
const navLinks = document.getElementById('nav-links');

hamburgerMenu.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});

let currentIndex = 0;
const carouselContainer = document.querySelector('.carousel-images');
const images = document.querySelectorAll('.carousel-images img');
const totalImages = images.length;

// Clone as imagens para permitir a rotação sem gaps
function cloneImages() {
    for (let i = 0; i < totalImages; i++) {
        const clonedImage = images[i].cloneNode(true); // Clona cada imagem
        carouselContainer.appendChild(clonedImage); // Adiciona no final
    }
}

// Função para mover para a próxima imagem
function nextImage() {
    currentIndex++;

    // Quando chegar à última imagem, voltar à primeira imagem sem lacunas
    if (currentIndex === totalImages) {
        setTimeout(() => {
            carouselContainer.style.transition = 'none'; // Desativa a transição temporariamente
            currentIndex = 0; // Reseta o índice
            carouselContainer.style.transform = `translateX(0)`; // Volta para o início
        }, 500); // Espera o tempo da transição para a última imagem
    } else {
        const offset = -currentIndex * 100; // Desloca para a esquerda
        carouselContainer.style.transition = 'transform 0.5s ease-in-out'; // Ativa a transição
        carouselContainer.style.transform = `translateX(${offset}%)`;
    }
}

// Inicia a clonagem das imagens
cloneImages();

// Mudar a imagem a cada 3 segundos
setInterval(nextImage, 3000);
