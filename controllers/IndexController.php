<?php
if (isset($_SESSION['user'])){
    require 'views/HomePage.php';
}
else header('Location: router.php?controller=login');


?>