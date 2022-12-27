<?php

class AddBalance extends Balance
{

    private $amount;
    private $user_id;

    public function __construct($amount, $user_id)
    {
        $this->amount = $amount;
        $this->user_id = $user_id;
    }

    public function addBalance()
    {
        if ($this->checkAmount() == false) {
            header("location: ../index.php/?error=invalidamount");
            exit();
        }
        if ($this->checkUser() == false) {
            header("location: ../index.php/?error=invalidfile");
            exit();
        }


        $this->adBalance($this->user_id, $this->amount);
    }

    private function checkAmount()
    {
        if (is_numeric($this->amount))
            return true;
        else
            return false;
    }

    private function checkUser()
    {
        if (!$this->checkUserNBal($this->user_id)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
}