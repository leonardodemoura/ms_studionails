// Efeito de Animação ao Rolar
document.addEventListener("DOMContentLoaded", () => {
    const dicaCards = document.querySelectorAll('.dica-card');

    window.addEventListener('scroll', () => {
        dicaCards.forEach(card => {
            const cardPosition = card.getBoundingClientRect().top;
            const screenPosition = window.innerHeight / 1.5;

            if (cardPosition < screenPosition) {
                card.classList.add('show');
            } else {
                card.classList.remove('show');
            }
        });
    });
});
const hamburgerMenu = document.getElementById('hamburger-menu');
const navLinks = document.getElementById('nav-links');

hamburgerMenu.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});