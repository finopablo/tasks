<?php
    include_once("db.php");
    include_once("lib/class.Templates.php");
    include_once("model/dao/class.UserDao.php");
    include_once("model/dao/class.TaskDao.php");
    include_once("controller/class.UserController.php");
    include_once("controller/class.TaskController.php");
    
    $tpl = new Templates("./html");
    $tpl->load_file("template.html", "main");
    define("UPLOAD_PATH", "C:/dev/Apache24/htdocs/test/files/avatar/");
    $userDao = new UserDao($conn);
    $userController = new UserController($userDao);
    $taskDao = new TaskDao($conn, $userDao);
    $taskController = new TaskController($taskDao);
?>