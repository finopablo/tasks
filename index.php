<?php
  $completePage = true;
  include_once("security.php");
  include_once("header.php");
  include_once("views/class.TasksView.php");
  $tpl->load_file("index.html", "mainContent");
  $tpl->pparse("main", false)
?>