<?php

class Login extends DB
{
    protected function getUser($uid, $pwd)
    {
        $statemnt = $this->connect()->prepare('SELECT pwd FROM users WHERE username = ? OR email = ?');

        if (!$statemnt->execute(array($uid, $pwd))) {
            $statemnt = null;
            header("location: ../index.php?error=statemntfailed");
            exit();
        }

        if ($statemnt->rowCount() == 0) {
            $statemnt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $statemnt->fetchAll(PDO::FETCH_ASSOC);

        $checkPwd = password_verify($pwd, $pwdHashed[0]["pwd"]);

        if ($checkPwd == false) {
            $statemnt = null;
            header("location: ../login.php?error=wrongpassword");
            exit();
        } else if ($checkPwd == true) {
            $statemnt = $this->connect()->prepare('SELECT * FROM users WHERE username = ? OR email = ? AND pwd = ?');

            if (!$statemnt->execute(array($uid, $uid, $pwd))) {
                $statemnt = null;
                header("location: ../login.php?error=statemntfailed");
                exit();
            }

            $user = $statemnt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION['username'] = $user[0]['username'];
            $_SESSION['userid'] = $user[0]['user_id'];
        }

        $statemnt = null;
    }
}