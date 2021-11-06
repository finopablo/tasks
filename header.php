<?php
    include_once("config.php");
    $tpl->load_file("header.html", "header");
    /**Verificamos si el usuario es admin , mostramos el boton new Task sino no lo mostramos */
    $smt = $conn->prepare("select * from users where username=:username");
    $smt->bindParam("username", $logged_user->username);
    $smt->execute();
    $data = $smt->fetch();
    if ($data["user_type"] == "admin") {
        $tpl->parse("ShowNewTask", false);
    } else{
        $tpl->set_var("ShowNewTask", "");
    }
    $tpl->parse("header", false);
?>