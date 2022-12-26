<script>
const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());
console.log(params);

if (params['signup'] == 'Success' || params['signup'] == 'success') {
    Swal.fire({
        icon: 'success',
        title: 'Registration Success'
    })
    window.history.pushState("object or string", "Title", "/" + "CreditSite/login.php");
}

if (params['error'] == 'notlogin') {
    Swal.fire({
        icon: 'error',
        title: 'Please Login First'
    })
    window.history.pushState("object or string", "Title", "/" + "CreditSite/login.php");
}

if (params['error'] == 'wrongpassword') {
    Swal.fire({
        icon: 'error',
        title: 'Wrong Credentials',
        text: 'Please check your username or password',
        confirmButtonText: 'Register',
        showCancelButton: true
    }).then((result) => {
        if (result.isConfirmed) {
            location.href = "register.php";
        } else {

        }

    })
    window.history.pushState("object or string", "Title", "/" + "CreditSite/login.php");
}

if (params['error'] == 'emptyInput') {
    Swal.fire({
        icon: 'error',
        title: 'Login Failed',
        text: 'Please fill out all fields'
    })
    window.history.pushState("object or string", "Title", "/" + "CreditSite/login.php");
}
</script>