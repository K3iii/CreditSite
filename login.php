<?php
session_start();
if (isset($_SESSION['username']) != '')
    header("location: index.php?error=alreadylog");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php include 'includes/plugins.php'; ?>


</head>

<body class="bg-slate-800 font-['Montserrat']">
    <?php include 'etc/login_alertsModal.php'; ?>

    <div class="flex justify-center items-center h-screen">
        <div class="w-96 p-6 shadow-lg bg-white rounded-md">
            <h1 class="border-b block text-3xl text-center text-semibold"><i class="fa-sharp fa-solid fa-users"></i>
                Login</h1>
            <div class="mt-6">
                <form action="includes/login.inc.php" method="post">
                    <label for="username" class="block text-base mb-2 ">Username</label>
                    <input type="text" id="username" name="username"
                        class="border w-full text-base mb-2 px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600"
                        placeholder="Enter Username">
                    <label for="password" class="block text-base mb-2">Password</label>
                    <input type="password" id="password" name="pwd"
                        class="border w-full text-base mb-2 px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600"
                        placeholder="Enter Password">

                    <button type="submit" name="login_btn"
                        class="w-full py-3 bg-slate-800 text-white mt-2 hover:bg-transparent hover:text-slate-900 border">Login</button>
                </form>
            </div>

            <button type="button" id='gotoregister'
                class="w-full py-3 bg-slate-800 text-white mt-2 hover:bg-transparent hover:text-slate-900 border">Register</button>
        </div>
    </div>
</body>




<script>
const gotoregister = document.querySelector('#gotoregister');
gotoregister.addEventListener('click', function() {
    location.href = "register.php";
})
</script>

</html>