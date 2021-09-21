<?php
       session_start();
       if (isset($_SESSION["username"])) {
        $logged_user = $_SESSION["username"];
       } else {
           header("Location:login.php");
       }
 ?>