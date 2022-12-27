const modal = document.querySelectorAll('#login');
const closeModal = document.querySelector('.close-modal');
const showModal = document.querySelector('#payment-modal');

for (let i = 0; i < modal.length; i++) {
    modal[i].addEventListener('click', function () {
        showModal.classList.toggle('hidden');
    });
}

closeModal.addEventListener('click', function () {
    showModal.classList.toggle('hidden');
});

const receiptbtn_mobile = document.querySelectorAll('#receiptbtn1');
const receiptclose_mobile = document.querySelectorAll('#close-receipt');

if (receiptbtn_mobile) {
    for (let i = 0; i < receiptbtn_mobile.length; i++) {

        receiptbtn_mobile[i].addEventListener('click', function () {
            receiptmodal[i].classList.toggle('hidden');
        });
        receiptclose_mobile[i].addEventListener('click', function () {
            receiptmodal[i].classList.toggle('hidden');
        })
    }
}