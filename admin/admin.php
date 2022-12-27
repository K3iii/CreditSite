<?php session_start();
$userid = $_SESSION['userid'];
if ($userid != 11)
    header("location: ../index.php?error=notadmin");
if ($userid == '') :
    header("location: ../login.php?error=notlogin");

else :



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
    <title>Admin PAge</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/custom_style.css">
    <script src="../assets/js/main.js" defer></script>
    <script src="../assets/js/admin_user.js" defer></script>
    <?php include '../includes/plugins.php'; ?>

</head>

<body class="bg-slate-800 font-Montserrat">

    <?php
        include '../includes/admin_header_nav.inc.php';
        ?>

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
                                        Sumary
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
                                        <?php echo $allPayment['arr'][$i]['name']; ?></td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        <?php echo $allPayment['arr'][$i]['amount']; ?>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        <?php echo $allPayment['arr'][$i]['pay_summary']; ?>
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
</script>

</html>

<?php endif; ?>