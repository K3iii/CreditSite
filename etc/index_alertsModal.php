<script>
const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());
if (params['login'] == 'success') {
    // window.location = window.location.href.split("?")[0];
    Swal.fire({
        icon: 'success',
        title: 'Login Success'
    })
    window.history.pushState("object or string", "Title", "/" + "CreditSite/index.php");
}
if (params['error'] == 'notadmin') {
    // window.location = window.location.href.split("?")[0];
    Swal.fire({
        icon: 'error',
        title: "You don't have any privilege"
    })
    window.history.pushState("object or string", "Title", "/" + "CreditSite/index.php");
}

if (params['payment'] == 'success') {
    // window.location = window.location.href.split("?")[0];
    Swal.fire({
        icon: 'success',
        title: "Successfuly send payment",
        text: 'Maghintay need ko pa icheck kung dumating'
    })
    window.history.pushState("object or string", "Title", "/" + "CreditSite/index.php");
}

if (params['error'] == 'alreadylog') {
    // window.location = window.location.href.split("?")[0];
    Swal.fire({
        icon: 'error',
        title: "Unable to access ",
        text: "You're already logged in"
    })
    window.history.pushState("object or string", "Title", "/" + "CreditSite/index.php");
}
</script>