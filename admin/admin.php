<?php session_start();
$userid = $_SESSION['userid'];
if ($userid != 11)
    header("location: ../index.php?error=notadmin");
if ($userid == '') {
    header("location: ../login.php?error=notlogin");
}



include '../classes/db.classes.php';
include '../includes/function.php';
$getTable = new userTable();
?>

<?php
$total = $getTable->callTotal($userid);
$totals = 0;
foreach ($total['arr'] as $row) {
    $totals = $totals + $row['amount'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/custom_style.css">
    <script src="../assets/js/main.js" defer></script>
    <script src="https://kit.fontawesome.com/36c158c363.js" crossorigin="anonymous"></script>

</head>

<body class="bg-slate-800 font-Montserrat">

    <header class=" sticky bg-slate-800 top-0 z-10 border-b-4">
        <section class="grid grid-cols-2  items-center justify-between md:justify-start p-4">


            <button id="hamburger-button" class="relative h-8 w-8 cursor-pointer text-3xl md:hidden">
                <!-- &#9776; -->
                <div
                    class="absolute top-4 -mt-0.5 h-1 w-8 rounded bg-white transition-all duration-500 before:absolute before:h-1 before:w-8 before:-translate-x-4 before:-translate-y-3 before:rounded before:bg-white before:transition-all before:duration-500 before:content-[''] after:absolute after:h-1 after:w-8 after:-translate-x-4 after:translate-y-3 after:rounded after:bg-white after:transition-all after:duration-500 after:content-['']">
                </div>
            </button>

            <nav class="hidden sm:inline space-x-2 text-fountain-blue-500" aria-label="main">
                <a href="http://" target="_blank" rel="noopener noreferrer">
                    <img src="../assets/img/credit-logo-1.png" alt="" srcset="" class="inline h-12">
                </a>
                <a href="#check" class="hover:opacity-90 family-serif ">Homepage</a>
                <a href="#payment-modal" id="login" class="hover:opacity-90">Pay Me</a>
                <a href="http://" class="hover:opacity-90">Contact Me</a>

            </nav>
            <nav class="text-fountain-blue-500 flex justify-end items-center">
                <?php if (isset($_SESSION['username'])) : ?>
                <span class="mx-5 font-bolds"><?php echo $_SESSION['username']; ?></span>
                <?php endif; ?>
                <button id="dropdownDefault" data-dropdown-toggle="dropdown"
                    class=" bg-white p-2 rounded-full w-10 h-10 hover:bg-white/50" type="button" aria-expanded="true"
                    aria-haspopup="true">
                    <i class="fa-solid fa-user"></i></i>
                </button>
                <div id="dropdown" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1"
                    class="hidden absolute right-1 z-10 mt-40 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <ul class="py-1 text-gray-700" aria-labelledby="dropdownDefault">
                        <a href="../includes/logout.inc.php">
                            <li class="block py-2 px-4">Balance : <i class="fa-solid fa-peso-sign"></i> <span
                                    class="font-bold"><?php echo $totals; ?></span>
                            </li>
                            <li class="block py-2 px-4 hover:text-red-500">Logout</li>
                        </a>
                    </ul>
                </div>

            </nav>

        </section>
        <section>
            <nav>

            </nav>
        </section>
        <section class="flex justify-end">

        </section>
        <section id="mobile-menu"
            class="top-68 justify-content-center absolute hidden w-full origin-top animate-open-menu flex-col bg-black text-5xl">
            <!-- <button class="text-8xl self-end px-6">
                        &times;
                    </button> -->
            <nav class="flex min-h-screen flex-col items-center py-8" aria-label="mobile">
                <a href="index.php" class="w-full py-6 text-white text-center hover:opacity-90">Home</a>
                <a href="#payment-modal" id="login" class="w-full py-6 text-white text-center hover:opacity-90">Pay
                    Me</a>
                <a href="#contact" class="w-full text-white py-6 text-center hover:opacity-90">Contact Me</a>
                <a href="includes/logout.inc.php" class="w-full py-6 text-white text-center hover:opacity-90">Logout</a>

            </nav>
        </section>
    </header>

    <main class="">
        <div class="container flex justify-center mx-auto">
            <div class="flex flex-col">
                <div class="w-full">
                    <div class="p-12 border-b border-gray-200 shadow">
                        <table class="divide-y divide-gray-300" id="dataTable">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Name
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Amount
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Receipt
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Date
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Status
                                    </th>
                                    <!-- <th class="px-6 py-2 text-xs text-gray-500">
                                        Edit
                                    </th> -->
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Approve
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-500">
                                <?php $allPayment = $getTable->getAllPayment();
                                for ($i = 0; $i < count($allPayment['arr']); $i++) :
                                ?>
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        <?php echo $allPayment['arr'][$i]['amount']; ?></td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        <?php echo $allPayment['arr'][$i]['amount']; ?>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="text-sm text-gray-900">
                                            <button
                                                class="block text-white bg-teal-500 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                type="button"
                                                data-modal-toggle="P-<?php echo $allPayment['arr'][$i]['payment_id']; ?>"
                                                id="pay1btn">
                                                Image Receipt
                                            </button>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="text-sm text-gray-500">
                                            <?php echo $allPayment['arr'][$i]['pay_date']; ?></div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        <?php if ($allPayment['arr'][$i]['pay_status'] == 1) : ?>
                                        <span
                                            class="p-1.5 text-sm font-medium tracking-wider rounded-lg bg-opacity-50 text-green-700 bg-green-300">
                                            Confirmed
                                        </span>
                                        <?php else : ?>
                                        <span class="px-4 py-1 text-sm text-red-400 bg-red-200 rounded-full">
                                            Not Confirmed
                                        </span>
                                        <?php endif; ?>
                                    </td>
                                    <!-- <td class="px-6 py-4 text-center">
                                        <a href="#"
                                            class="px-4 py-1 text-sm text-blue-600 bg-blue-200 rounded-full">Edit</a>
                                    </td> -->
                                    <td class="px-6 py-4 text-center">
                                        <form action="" method="post">
                                            <input type="hidden"
                                                value="<?php echo $allPayment['arr'][$i]['payment_id']; ?>"
                                                name="payid">
                                            <button class="px-4 py-1 text-sm text-green-400 bg-green-200 rounded-full"
                                                name='ApprovedStatus' id="ApprovedStatus">Confirm</button>
                                        </form>
                                        <?php if (isset($_POST['ApprovedStatus'])) {
                                                $getTable->payConfirm($_POST['payid']);
                                            } ?>

                                    </td>
                                </tr>
                                <?php endfor; ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    </main>

    <div class="container-xl mt-8 border-t-2 border-white">
        <div class="max-w-4xl mx-auto py-4">
            <span class="font-bolds text-white">
                &copy; Coded by : JM
            </span>
        </div>
    </div>


    <?php include 'admin_modals.php'; ?>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#dataTable').DataTable();

});
// const approvebtn = document.querySelector('#ApprovedStatus');
// approvebtn.addEventListener('click', function() {
//     window.location = window.location.href.split("?")[0];

// })
</script>

</html>