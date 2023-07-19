<?php
    require '../../controllers/BaseController.php';
    session_destroy();
    Redirect("../login.php");
?>