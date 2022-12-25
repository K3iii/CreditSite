const modal = document.querySelectorAll('#login');
const closeModal = document.querySelector('.close-modal');
const showModal = document.querySelector('#payment-modal');

for (let i = 0; i < modal.length; i++) {
    modal[i].addEventListener('click', function () {
        // showModal.classList.remove('hidden');
        showModal.classList.toggle('hidden');
    });
}

closeModal.addEventListener('click', function () {
    // showModal.classList.add('hidden');
    showModal.classList.toggle('hidden');
});