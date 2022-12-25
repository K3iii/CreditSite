<?php

class Signup extends DB
{
    protected function setUser($uid, $name, $pwd, $email)
    {
        $statemnt = $this->connect()->prepare('INSERT INTO users (username, name, pwd, email) VALUES (?, ?, ?, ?)');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        if (!$statemnt->execute(array($uid, $name, $hashedPwd, $email))) {
            $statemnt = null;
            header("location: ../index.php?error=statemntfailed");
            exit();
        }
        mkdir("../payment_receipt/${uid}", 0777);

        $statemnt = null;
    }

    protected function checkUser($uid, $email)
    {
        $statemnt = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');

        if (!$statemnt->execute(array($uid, $email))) {
            $statemnt = null;
            header("location: ../index.php?error=statemntfailed");
            exit();
        }

        $resultCheck = true;

        if ($statemnt->rowCount() > 0) {
            $resultCheck = false;
        }

        return $resultCheck;
    }
}