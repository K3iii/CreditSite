<?php
session_start();
if (isset($_POST['addpayment'])) {

    //get data
    $amount = $_POST['money'];
    $receipt = $_FILES['receipt']['name'];
    $date = $_POST['date'];
    $receipttmp = $_FILES['receipt']['tmp_name'];
    $uid = $_SESSION['username'];
    $user_id = $_SESSION['userid'];


    //initialize

    include '../classes/db.classes.php';
    include '../classes/payment.classes.php';
    include '../classes/payment-contr.classes.php';
    $payment = new PaymentContr($amount, $receipt, $date, $receipttmp, $uid, $user_id);
    //running error

    $payment->submitPay();

    //
    header("location: ../index.php?payment=success");
}