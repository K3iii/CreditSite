<?php session_start();
$userid = $_SESSION['userid'];
if ($userid == '')
    header("location: login.php?error=notlogin");


include 'classes/db.classes.php';
include 'includes/function.php';
$getTable = new userTable();
?>

<?php
$total = $getTable->callTotal($userid);
$totals = 0;
foreach ($total['arr'] as $row) {
    $totals = $totals + $row['amount'];
}

$utang = $getTable->curUtang($userid);
$utang = $utang['arr'][0]['utang'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magbayad kana!</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom_style.css">


    <script src="assets/js/normal_user.js" defer></script>
    <!-- <script src="assets/js/main.js" defer></script> -->
    <!-- <script src="https://kit.fontawesome.com/36c158c363.js" crossorigin="anonymous"></script> -->

    <?php
    include 'includes/plugins.php';
    ?>

</head>

<body class="bg-slate-800 font-Montserrat">

    <?php include 'etc/index_alertsModal.php';
    ?>
    <header class=" sticky bg-slate-800 top-0 z-10 border-b-4">
        <section class="grid grid-cols-2  items-center justify-between md:justify-start p-4">


            <button id="hamburger-button" class="relative h-8 w-8 cursor-pointer text-3xl md:hidden">
                <!-- &#9776; -->
                <div
                    class="absolute top-4 -mt-0.5 h-1 w-8 rounded bg-white transition-all duration-500 before:absolute before:h-1 before:w-8 before:-translate-x-4 before:-translate-y-3 before:rounded before:bg-white before:transition-all before:duration-500 before:content-[''] after:absolute after:h-1 after:w-8 after:-translate-x-4 after:translate-y-3 after:rounded after:bg-white after:transition-all after:duration-500 after:content-['']">
                </div>
            </button>

            <nav class="hidden sm:inline space-x-2 text-fountain-blue-500" aria-label="main">
                <a href="" target="_blank" rel="noopener noreferrer">
                    <img src="assets/img/credit-logo-1.png" alt="" srcset="" class="inline h-12">
                </a>
                <a href="index.php" class="hover:opacity-90 family-serif ">Homepage</a>
                <span class="hover:opacity-90 cursor-pointer" type="button" data-modal-toggle="payment-modal"
                    id="login">Pay Me</span>
                <a href="mailto:jmprofile.link" class="hover:opacity-90">Contact Me</a>

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
                        <?php if ($userid != 11) : ?>
                        <li class="block py-2 px-4">Balance : <i class="fa-solid fa-peso-sign"></i> <span
                                class="font-bold"><?php echo $utang - $totals; ?></span>
                        </li>
                        <?php else : ?>
                        <li class="block py-2 px-4 hover:text-red-500"><a href="admin/admin.php">Admin Page</a></li>
                        <?php endif; ?>
                        <li class="block py-2 px-4 hover:text-red-500"><a href="includes/logout.inc.php">Logout</a></li>

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
                <a href="mailto:jmprofile.link" class="w-full text-white py-6 text-center hover:opacity-90">Contact
                    Me</a>
                <a href="includes/logout.inc.php" class="w-full py-6 text-white text-center hover:opacity-90">Logout</a>

            </nav>
        </section>
    </header>

    <main class="min-h-screen max-w-4xl mx-auto md:bg-inherit bg-gray-200 rounded-md">


        <div class="md:flex my-10 p-2 justify-center">
            <div>
                <div class="block mb-2">
                    <button
                        class="block text-white bg-teal-500 hover:bg-fountain-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button" data-modal-toggle="payment-modal" id="login">
                        Add Payment
                    </button>
                </div>
                <div class="hidden md:block max-w-4xl">

                    <table class="divide-y divide-gray-30" id="tble">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-2 text-xs text-gray-500">Payment</th>
                                <th class="px-6 py-2 text-xs text-gray-500">Receipt</th>
                                <th class="px-6 py-2 text-xs text-gray-500">Date</th>
                                <th class="px-6 py-2 text-xs text-gray-500">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-500">
                            <?php

                            $getTable = $getTable->tryMe($userid);
                            for ($i = 0; $i < count($getTable['arr']); $i++) :

                            ?>
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-center text-gray-500">
                                    <?php echo $getTable['arr'][$i]['amount']; ?></td>
                                <td class="px-6 py-4 text-sm text-center text-gray-500"><button
                                        class="block text-white bg-teal-500 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button"
                                        data-modal-toggle="<?php echo $getTable['arr'][$i]['payment_id']; ?>"
                                        id="receiptbtn">
                                        Image Receipt
                                        <?php $receiptimg = $getTable['arr'][$i]['payment_id'];
                                            echo $receiptimg; ?>

                                    </button></td>
                                <td class="px-6 py-4 text-sm text-center text-gray-500">
                                    <?php echo $getTable['arr'][$i]['pay_date']; ?></td>
                                <td class="px-6 py-4 text-sm text-center text-gray-500">
                                    <?php if ($getTable['arr'][$i]['pay_status'] == 1) : ?>
                                    <span class="px-4 py-1 text-sm text-green-400 bg-green-200 rounded-full">
                                        Confirmed
                                    </span>
                                    <?php else : ?>
                                    <span class="px-4 py-1 text-sm text-red-400 bg-red-200 rounded-full">
                                        Not Confirmed
                                    </span>
                                    <?php endif; ?>
                                </td>

                            </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php for ($i = 0; $i < count($getTable['arr']); $i++) : ?>
        <div class=" grid grid-cols-1 gap-4 md:hidden mb-2">
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex items-center space-x-2 text-sm">
                    <div class="text-medium"><span class="font-bold hover:underline text-red-900">&#8369;
                            <?php echo $getTable['arr'][$i]['amount']; ?></span>
                    </div>
                    <div class="font-bold"><?php echo $getTable['arr'][$i]['pay_date']; ?></div>

                </div>
                <div class="mt-4">
                    <?php if ($getTable['arr'][$i]['pay_status'] == 1) : ?>
                    <span class="px-4 py-1 text-sm text-green-400 bg-green-200 rounded-full">
                        Confirmed
                    </span>
                    <?php else : ?>
                    <span class="px-4 py-1 text-sm text-red-400 bg-red-200 rounded-full">
                        Not Confirmed
                    </span>
                    <?php endif; ?>
                </div>
                <div class="mt-4">
                    <a href="#<?php echo $getTable['arr'][$i]['payment_id']; ?>"
                        class="px-4 py-1 text-sm text-blue-600 bg-blue-200 rounded-full" type="button"
                        data-modal-toggle="<?php echo $getTable['arr'][$i]['payment_id']; ?>" id="receiptbtn1">Image
                        Receipt</a>
                </div>
            </div>
        </div>
        <?php endfor; ?>

        <!-- <div class=" grid grid-cols-1 gap-4 md:hidden mb-2">
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex items-center space-x-2 text-sm">
                    <div class="text-medium"><span class="font-bold hover:underline text-red-900">&#8369; 100</span>
                    </div>
                    <div class="font-bold">Date</div>
                    <div>
                        <span
                            class="p-1.5 text-sm font-medium tracking-wider rounded-lg bg-opacity-50 text-green-700 bg-green-300">
                            Confirmed
                        </span>
                    </div>
                </div>
                <div class="mt-10">
                    <a href="http://">Link ng Resibo</a>
                </div>
            </div>
        </div> -->



    </main>

    <div class="container-xl mt-8 border-t-2 border-white">
        <div class="max-w-4xl mx-auto py-4">
            <span class="font-bolds text-white">
                &copy; Coded by : JM
            </span>
        </div>
    </div>


    <?php include 'etc/modals.php'; ?>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#tble').DataTable();
});
</script>

</html>