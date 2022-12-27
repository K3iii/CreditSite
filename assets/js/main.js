const initApp = () => {
    const hamburgerBtn = document.getElementById('hamburger-button')
    const mobileMenu = document.getElementById('mobile-menu')

    const toggleMenu = () => {
        mobileMenu.classList.toggle('hidden')
        mobileMenu.classList.toggle('flex')
        hamburgerBtn.classList.toggle('toggle-btn')
    }

    hamburgerBtn.addEventListener('click', toggleMenu)
    mobileMenu.addEventListener('click', toggleMenu)
}

document.addEventListener('DOMContentLoaded', initApp)



const login = document.querySelector('#dropdownDefault');
const login_dp = document.querySelector('#dropdown')
login.addEventListener('click', function () {
    login_dp.classList.toggle('hidden');
})

const receiptbtn = document.querySelectorAll('#receiptbtn');
const receiptmodal = document.querySelectorAll('.receiptpayment');
const receiptclose = document.querySelectorAll('.close-receipt');


if (receiptbtn) {
    for (let i = 0; i < receiptbtn.length; i++) {
        receiptbtn[i].addEventListener('click', function () {
            receiptmodal[i].classList.toggle('hidden');
        });
        receiptclose[i].addEventListener('click', function () {
            receiptmodal[i].classList.toggle('hidden');
        })
    }
}

const paytbtn = document.querySelectorAll('#pay1btn');
const allpay = document.querySelectorAll('.Allpayment');
const closepay = document.querySelectorAll('.close-payment');

for (let i = 0; i < paytbtn.length; i++) {
    paytbtn[i].addEventListener('click', function () {
        allpay[i].classList.toggle('hidden');
    });
    closepay[i].addEventListener('click', function () {
        allpay[i].classList.toggle('hidden');
    })
}

