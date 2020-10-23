<?php

require_once 'utils/Db.php';
require_once 'models/User.php';
require_once 'models/WorkSchedule.php';
require_once 'core/interfaces/IUser.php';
require_once 'core/interfaces/IWorkSchedule.php';
require_once 'core/implementations/UserImplementation.php';
require_once 'core/implementations/WorkScheduleImplementation.php';

session_start();
if (isset($_GET['controller'])){

    switch ($_GET['controller']){
        case '' :
            require 'controllers/IndexController.php';
            break;
        case 'login' :
            require 'controllers/LoginController.php';
            break;
    }

}