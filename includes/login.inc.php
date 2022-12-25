<?php
if (isset($_POST['login_btn'])) {

    //get data
    $user_id = $_POST['username'];
    $pwd = $_POST['pwd'];


    //initialize

    include '../classes/db.classes.php';
    include '../classes/login.classes.php';
    include '../classes/login-contr.classes.php';
    $login = new LoginContrl($user_id, $pwd);
    //running error

    $login->LoginUser();

    //
    header("location: ../index.php?login=success");

?>



<?php } ?>