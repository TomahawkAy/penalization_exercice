<?php
if (isset($_SESSION['user']))
{
    header('Location: router.php?controller=');
}
else {
    if (isset($_POST['login']) && isset($_POST['password'])) {
        // calling to the login method ...
        if (UserImplementation::login($_POST['login'],$_POST['password'])){
            \Implementations\WorkScheduleImplementation::checkForPenality($_SESSION['entry-time'],$_SESSION['user']);
        }

    }
    else {
        require 'views/Login.php';
    }
}
