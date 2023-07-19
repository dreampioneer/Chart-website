<?php

    require './controllers/BaseController.php'; 
     $mysql = new MySQL();
    if($mysql->init_conn() == true) {
        Redirect('./routes/login.php');
    } else {
        Redirect('./routes/error.php');
    }
?>
