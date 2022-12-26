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
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php include 'includes/plugins.php'; ?>
</head>

<body class="bg-slate-800 font-['Montserrat']">
    <?php include 'etc/reg_alertsModal.php'; ?>
    <div class="flex justify-center items-center h-screen">
        <div class="w-96 p-6 shadow-lg bg-white rounded-md">
            <h1 class="border-b block text-3xl text-center text-semibold"><i class="fa-sharp fa-solid fa-users"></i>
                Register</h1>
            <div class="mt-6">
                <form action="includes/signup.inc.php" method="post">
                    <label for="username" class="block text-base mb-2 ">Username</label>
                    <input type="text" id="username" name="username"
                        class="border w-full text-base mb-2 px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600"
                        placeholder="Enter Username">
                    <label for="pwd" class="block text-base mb-2">Password</label>
                    <input type="password" id="pwd" name="pwd"
                        class="border w-full text-base mb-2 px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600"
                        placeholder="Enter Password">
                    <label for="repPwd" class="block text-base mb-2">Repeat Password</label>
                    <input type="password" id="repPwd" name="repPwd"
                        class="border w-full text-base mb-2 px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600"
                        placeholder="Repeat Password">
                    <label for="user_Name" class="block text-base mb-2">Enter Name</label>
                    <input type="text" id="user_Name" name="user_Name"
                        class="border w-full text-base mb-2 px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600"
                        placeholder="Nickname or Full Name">
                    <label for="email" class="block text-base mb-2">Enter Email</label>
                    <input type="email" id="email" name="email"
                        class="border w-full text-base mb-2 px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600"
                        placeholder="Enter Email">

                    <button type="submit" name="signup_btn"
                        class="w-full py-3 bg-slate-800 text-white mt-2 hover:bg-transparent hover:text-slate-900 border">Register</button>
                </form>
                <button id='backtologin'
                    class="w-full py-3 bg-slate-800 text-white mt-2 hover:bg-transparent hover:text-slate-900 border">Back
                    to Login</button>
            </div>
        </div>
    </div>

</body>
<script>
const backtologin = document.querySelector('#backtologin');
backtologin.addEventListener('click', function() {
    location.href = "login.php";
})
</script>

</html>