<?php
    include_once("db.php");
    include_once("lib/class.Templates.php");
    include_once("security.php");
    $tpl = new Templates("./html");
    $tpl->load_file("template.html", "main");
    define("UPLOAD_PATH", "C:/dev/Apache24/htdocs/test/files/avatar/");

?>