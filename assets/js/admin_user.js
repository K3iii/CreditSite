const balance_btn = document.querySelector('#Add_Balance');
const addbal_btn = document.querySelector('#adbal');
const closebal_btn = document.querySelector('.bal-close');

addbal_btn.addEventListener('click', () => {
    balance_btn.classList.toggle('hidden');
})

closebal_btn.addEventListener('click', () => {
    balance_btn.classList.toggle('hidden');
})