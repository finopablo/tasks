<?php
    include_once("model/class.User.php");
       session_start();
       if (isset($_SESSION["user"])) {
        $logged_user = unserialize($_SESSION["user"]);
       } else {
           header("Location:login.php");
       }
 ?>