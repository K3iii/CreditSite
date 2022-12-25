<?php

class SignupController extends Signup
{

    private $uid;
    private $pwd;
    private $repeatPwd;
    private $name;
    private $email;

    public function __construct($user_id, $user_Name, $pwd, $repeatPwd, $email)
    {
        $this->uid = $user_id;
        $this->pwd = $pwd;
        $this->repeatPwd = $repeatPwd;
        $this->name = $user_Name;
        $this->email = $email;
    }

    public function signupUser()
    {
        session_start();
        if ($this->emptyInput() == false) {
            header("location: ../register.php?error=emptyInput");
            exit();
        }
        if ($this->InvalidUsername() == false) {
            header("location: ../register.php?error=username");
            exit();
        }
        if ($this->invalidEmail() == false) {
            header("location: ../register.php?error=email");
            exit();
        }
        if ($this->pwdMatch() == false) {
            header("location: ../register.php?error=password");
            exit();
        }
        if ($this->uidTakenCheck() == false) {
            header("location: ../register.php?error=usernameoremailTaken");
            exit();
        }

        $this->setUser($this->uid, $this->name, $this->pwd, $this->email);
    }



    private function emptyInput()
    {
        $result = true;
        if (empty($this->uid) || empty($this->pwd) || empty($this->repeatPwd) || empty($this->name) || empty($this->email)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function InvalidUsername()
    {

        if (preg_match('/^[a-z]\w{2,23}[^_]$/i', $this->uid)) {
            $result = true;
        } else
            $result = false;

        return $result;
    }

    private function invalidEmail()
    {
        $result = true;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL))
            $result = false;
        else
            $result = true;

        return $result;
    }

    private function pwdMatch()
    {
        $result = true;
        if ($this->pwd !== $this->repeatPwd)
            $result = false;
        else
            $result = true;

        return $result;
    }

    private function uidTakenCheck()
    {
        $result = true;
        if (!$this->checkUser($this->uid, $this->email))
            $result = false;

        return $result;
    }
}