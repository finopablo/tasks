<?php
 
    include_once(dirname(__FILE__) ."/lib/class.Templates.php");
    include_once(dirname(__FILE__) ."/db.php");
    include_once(dirname(__FILE__) ."/model/dao/class.UserDao.php");
    include_once(dirname(__FILE__) ."/model/dao/class.TaskDao.php");
    include_once(dirname(__FILE__) ."/model/dao/class.GeoDao.php");
    include_once(dirname(__FILE__) ."/controller/class.UserController.php");
    include_once(dirname(__FILE__) ."/controller/class.TaskController.php");
    include_once(dirname(__FILE__) ."/controller/class.GeoController.php");
    $tpl = new Templates(dirname(__FILE__) . "./html");
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
