<?php

class Payment extends DB
{
    protected function setPayment($user_id, $amount, $tmpFolder, $date, $summary)
    {
        $statemnt = $this->connect()->prepare('INSERT INTO payment (user_id, amount, receipt, pay_date, pay_summary) VALUES (?, ?, ?, ?, ?)');


        if (!$statemnt->execute(array($user_id, $amount, $tmpFolder, $date, $summary))) {
            $statemnt = null;
            header("location: ../index.php?error=statemntfailed");
            exit();
        }

        $statemnt = null;
    }
}