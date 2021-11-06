<?php
  include_once("security.php");
  include_once("config.php");
  include_once("views/class.TasksView.php");
  $tasks = $taskController->getTasksAssignedToUser($logged_user->username);
  $view = new TasksView($tpl);
  $view->show($tasks);
?>