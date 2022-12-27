<?php

class PaymentContr extends Payment
{

    private $amount;
    private $receipt;
    private $receipttmp;
    private $date;
    private $uid;
    private $tmpFolder;
    private $user_id;
    private $summary;

    public function __construct($amount, $receipt, $date, $receipttmp, $uid, $user_id, $summary)
    {
        $this->amount = $amount;
        $this->receipt = $receipt;
        $this->date = $date;
        $this->receipttmp = $receipttmp;
        $this->uid = $uid;
        $this->user_id = $user_id;
        $this->summary = $summary;
    }

    public function submitPay()
    {
        if ($this->checkAmount() == false) {
            header("location: ../index.php/?error=invalidamount");
            exit();
        }
        if ($this->checkReceipt() == false) {
            header("location: ../index.php/?error=invalidfile");
            exit();
        }
        $this->tmpFolder = "payment_receipt/$this->uid/" . $this->receipt;


        $this->setPayment($this->user_id, $this->amount, $this->tmpFolder, $this->date, $this->summary);
    }

    private function checkAmount()
    {
        if (is_numeric($this->amount))
            return true;
        else
            return false;
    }

    private function checkReceipt()
    {
        $allowed = array('gif', 'png', 'jpg', 'jpeg');
        $ext = pathinfo($this->receipt, PATHINFO_EXTENSION);
        $pathfolder = '../payment_receipt/' . $this->uid . '/' . $this->receipt;
        if (!in_array($ext, $allowed))
            return false;
        else {
            move_uploaded_file($this->receipttmp, $pathfolder);
            return true;
        }
    }
}