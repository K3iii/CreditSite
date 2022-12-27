<?php
// include '../classes/db.classes.php';
class userTable extends DB
{
    protected function getTable($id)
    {
        $query = "SELECT * FROM payment WHERE user_id = $id";
        $statemt = $this->connect()->query($query);
        $arr['arr'] = array(); // added
        if (!$statemt) {
            echo 'error';
        } else {
            while ($row = $statemt->fetchAll(PDO::FETCH_ASSOC)) {
                $arr['arr'] = $row;
            }

            return $arr;
        }
    }

    public function tryMe($id)
    {
        return $this->getTable($id);
    }

    protected function getTotal($id)
    {
        $query = "SELECT amount,pay_status FROM payment WHERE user_id = $id";
        $statemt = $this->connect()->query($query);
        $total['arr'] = array(); // added
        // $total = 0;
        if (!$statemt)
            header("location: ../index.php?error=didnotgetData");
        else {
            while ($row = $statemt->fetchAll(PDO::FETCH_ASSOC)) {
                $total['arr'] = $row;
            }
            return $total;
        }
    }

    public function callTotal($id)
    {
        return $this->getTotal($id);
    }

    protected function curCredit($id)
    {
        $query = "SELECT utang FROM users WHERE user_id = $id";
        $statemt = $this->connect()->query($query);

        if (!$statemt)
            header("location: ../index.php?error=didnotgetData");
        else {
            while ($row = $statemt->fetchAll(PDO::FETCH_ASSOC)) {
                $total['arr'] = $row;
            }
            return $total;
        }
    }

    public function curUtang($id)
    {
        return $this->curCredit($id);
    }

    protected function allPayment()
    {
        $query = "SELECT users.name, pay.* FROM users users, payment pay WHERE users.user_id = pay.user_id";
        $statemt = $this->connect()->query($query);
        if (!$statemt)
            header("location: ../index.php?error=didnotgetData");
        else {
            while ($row = $statemt->fetchAll(PDO::FETCH_ASSOC)) {
                $total['arr'] = $row;
            }
            return $total;
        }
    }

    public function getAllPayment()
    {
        return $this->allPayment();
    }

    protected function payStatus($id)
    {
        $query = "UPDATE payment SET pay_status = 1 WHERE payment_id = $id";
        $statemt = $this->connect()->query($query);
        if (!$statemt)
            header("location: ../index.php?error=didnotgetData");
        echo "<meta http-equiv='refresh' content='0'>";
    }

    public function payConfirm($id)
    {
        return $this->payStatus($id);
    }
}