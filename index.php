<?php
  include_once("security.php");
  include_once("header.php");
  include_once("views/class.TasksView.php");
  $tpl->load_file("tasks.html", "mainContent");
  $tasks = $taskController->getTasksAssignedToUser($logged_user->username);
  $view = new TasksView($tpl);
  $view->show($tasks);
?>