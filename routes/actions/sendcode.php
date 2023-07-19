<?php
    require '../../controllers/BaseController.php';

    if(isset($_POST['email'])) {
        $_SESSION["email"] = $_POST['email'];
        echo email_verify($_SESSION["email"]);
    }
?>