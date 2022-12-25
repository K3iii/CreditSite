<?php

class LoginContrl extends Login
{

    private $uid;
    private $pwd;
    private $repeatPwd;
    private $name;
    private $email;

    public function __construct($user_id, $pwd)
    {
        $this->uid = $user_id;
        $this->pwd = $pwd;
    }

    public function LoginUser()
    {
        if ($this->emptyInput() == false) {
            header("location: ../login.php?error=emptyInput");
            exit();
        }

        $this->getUser($this->uid, $this->pwd, $this->name);
    }

    private function emptyInput()
    {
        $result = true;
        if (empty($this->uid) || empty($this->pwd)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
}