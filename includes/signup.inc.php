<?php
if (isset($_POST['signup_btn'])) {

    //get data
    $user_id = $_POST['username'];
    $pwd = $_POST['pwd'];
    $repeatPwd = $_POST['repPwd'];
    $user_Name = $_POST['user_Name'];
    $email = $_POST['email'];

    //initialize

    include '../classes/db.classes.php';
    include '../classes/signup.classes.php';
    include '../classes/signup-contr.classes.php';
    $signup = new SignupController($user_id, $user_Name, $pwd, $repeatPwd,  $email);
    //running error

    $signup->signupUser();

    //go back to login

    header("location: ../login.php?signup=Success");
}