<script>
const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());

if (params['error'] == 'emptyInput') {
    Swal.fire({
        icon: 'error',
        title: 'Registration Failed',
        text: 'Please fill out all fields'
    })
} else if (params['error'] == 'username') {
    Swal.fire({
        icon: 'error',
        title: 'Registration Failed',
        html: '<li>Username must start with a letter <br></li>' +
            '<li>Username minimum of 4 and maximum of 25 <br></li>' +
            "<li>Username accepts letters, numbers, and the underscore character <br></li>" +
            "<li>Username can not end with an underscore</li>"
    })
} else if (params['error'] == 'password') {
    Swal.fire({
        icon: 'error',
        title: 'Registration Failed',
        text: 'Password is not the same'
    })
} else if (params['error'] == 'usernameoremailTaken') {
    Swal.fire({
        icon: 'error',
        title: 'Registration Failed',
        text: 'Username or Email has been taken already'
    })
}

window.history.pushState("object or string", "Title", "/" + "CreditSite/register.php");
</script>