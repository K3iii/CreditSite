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
    console.log('naghide');
})

const receiptbtn = document.querySelectorAll('#receiptbtn');
const receiptmodal = document.querySelectorAll('.receiptpayment');
const receiptclose = document.querySelectorAll('.close-receipt');
const receiptbtn_mobile = document.querySelectorAll('#receiptbtn1');
const receiptclose_mobile = document.querySelectorAll('#close-receipt');

for (let i = 0; i < receiptbtn.length; i++) {
    console.log(receiptbtn.length);
    receiptbtn[i].addEventListener('click', function () {
        // showModal.classList.remove('hidden');
        receiptmodal[i].classList.toggle('hidden');
    });
    receiptclose[i].addEventListener('click', function () {
        receiptmodal[i].classList.toggle('hidden');
    })
}
for (let i = 0; i < receiptbtn1.length; i++) {

    receiptbtn_mobile[i].addEventListener('click', function () {
        // showModal.classList.remove('hidden');
        receiptmodal[i].classList.toggle('hidden');
    });
    receiptclose_mobile[i].addEventListener('click', function () {
        receiptmodal[i].classList.toggle('hidden');
    })
}
// receiptbtn.addEventListener('click', function () {
//     receiptmodal.classList.toggle('hidden');
// })

// receiptclose.addEventListener('click', function () {
//     receiptmodal.classList.toggle('hidden');
// })

const paytbtn = document.querySelectorAll('#pay1btn');
const allpay = document.querySelectorAll('.Allpayment');
const closepay = document.querySelectorAll('.close-payment');


for (let i = 0; i < paytbtn.length; i++) {
    paytbtn[i].addEventListener('click', function () {
        // showModal.classList.remove('hidden');
        allpay[i].classList.toggle('hidden');
    });
    closepay[i].addEventListener('click', function () {
        allpay[i].classList.toggle('hidden');
    })
}

