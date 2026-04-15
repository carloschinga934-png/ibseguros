const bulb = document.getElementById('bulb');
const innovacionCard = document.querySelector('.innovacion');

innovacionCard.addEventListener('mouseenter', () => {
   bulb.classList.remove('bi-lightbulb');
   bulb.classList.add('bi-lightbulb-fill');
});

innovacionCard.addEventListener('mouseleave', () => {
   bulb.classList.remove('bi-lightbulb-fill');
   bulb.classList.add('bi-lightbulb');
});

