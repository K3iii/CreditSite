<?php session_start();
$userid = $_SESSION['userid'];
if ($userid == '') :
    header("location: login.php?error=notlogin");

else :
    include 'classes/db.classes.php';
    include 'includes/function.php';
    $getTable = new userTable();
?>

<?php
    $total = $getTable->callTotal($userid);
    $totals = 0;
    foreach ($total['arr'] as $row) {
        if ($row['pay_status'] == 1)
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
    <script src="assets/js/main.js" defer></script>
    <script src="assets/js/normal_user.js" defer></script>
    <?php
        include 'includes/plugins.php';
        ?>

</head>

<body class="bg-slate-800 font-Montserrat">

    <?php
        include 'etc/index_alertsModal.php';
        include 'includes/header_nav.inc.php';
        ?>


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
                                <th class="px-6 py-2 text-xs text-gray-500">Summary</th>
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
                                <td class="px-6 py-4 text-sm -text-center text-gray-500">
                                    <?php echo $getTable['arr'][$i]['pay_summary']; ?>
                                </td>
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

<?php endif; ?>