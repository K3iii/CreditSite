<?php
session_start();
if (isset($_POST['add_bal'])) {

    //get data
    $user_id = $_POST['add_bal_name'];
    $amount = $_POST['input_bal'];


    //initialize

    include '../classes/db.classes.php';
    include '../classes/add_balance.classes.php';
    include '../classes/add_balance-contr.classes.php';
    $adbal = new AddBalance($amount, $user_id);
    //running error

    $adbal->addBalance();

    //
    header("location: ../admin/admin.php?addbalance=success");
}