<?php

class Balance extends DB
{
    protected function adBalance($user_id, $amount)
    {


        $statemnt = $this->connect()->prepare('SELECT user_id, utang FROM users WHERE user_id = ?');


        if (!$statemnt->execute(array($user_id))) {
            $statemnt = null;
            header("location: ../index.php?error=statemntfailed");
            exit();
        }

        $balance = $statemnt->fetchAll(PDO::FETCH_ASSOC);
        $balance = $balance[0]['utang'] + $amount;
        $statemnt_bal = $this->connect()->prepare("UPDATE users SET utang = ? WHERE user_id = ?");
        if (!$statemnt_bal->execute(array($balance, $user_id))) {
            $statemnt = NULL;
            header("location: ../admin/admin.php?error=errorsapagadd");
            exit();
        }
    }

    protected function checkUserNBal($user_id)
    {
        $statemnt = $this->connect()->prepare('SELECT user_id FROM users WHERE user_id = ?');

        if (!$statemnt->execute(array($user_id))) {
            $statemnt = NULL;
            header("location: ../admin/admin.php?error=cannotaddbal");
            exit();
        }

        if ($statemnt->rowCount() > 0) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }
}