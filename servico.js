document.querySelectorAll('.inspiration-card img').forEach(img => {
    img.addEventListener('click', (e) => {
        const imgSrc = e.target.src;
        const modal = document.createElement('div');
        modal.classList.add('modal');
        modal.innerHTML = `<div class="modal-content"><span class="close-btn">&times;</span><img src="${imgSrc}" alt="Imagem Ampliada"></div>`;
        document.body.appendChild(modal);

        const closeBtn = modal.querySelector('.close-btn');
        closeBtn.addEventListener('click', () => {
            modal.remove();
        });
    });
});
const hamburgerMenu = document.getElementById('hamburger-menu');
const navLinks = document.getElementById('nav-links');

hamburgerMenu.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});


