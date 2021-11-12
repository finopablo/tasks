<?php
    
    include_once("db.php");
    include_once("lib/class.Templates.php");
    include_once("model/dao/class.UserDao.php");
    include_once("model/dao/class.TaskDao.php");
    include_once("model/dao/class.GeoDao.php");
    include_once("controller/class.UserController.php");
    include_once("controller/class.TaskController.php");
    include_once("controller/class.GeoController.php");
    $tpl = new Templates("./html");
    if (isset($completePage) && ($completePage)) {
        $tpl->load_file("template.html","main");
    }
    define("UPLOAD_PATH", "C:/dev/Apache24/htdocs/test/files/avatar/");
    $userDao = new UserDao($conn);
    $geoDao = new GeoDao($conn);
    $taskDao = new TaskDao($conn, $userDao);
    $userController = new UserController($userDao);
    $taskController = new TaskController($taskDao);
    $geoController = new GeoController($geoDao);
?>
