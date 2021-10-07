<?php
  include_once("header.php");
  $tpl->load_file("tasks.html", "mainContent");
  $sql = "SELECT 
      t.id_task,
      cu.name AS creation_user_name,
      cu.last_name AS creation_user_last_name,
      s.status_name AS status,
      s.id_status,
      t.title,
      t.description,
      t.due_date,
      t.last_update
  FROM 
      tasks t 
      INNER JOIN status s ON t.id_status = s.id_status
      INNER JOIN users cu ON t.creation_user = cu.username
      INNER JOIN users au ON t.assigned_user = au.username
  WHERE 
      t.assigned_user = :username";
  $stmt = $conn->prepare($sql);
  
  $stmt->bindParam("username", $logged_user);
  $stmt->execute();
  $tasks = $stmt->fetchAll();


  if (count($tasks)>0 ) {
    $tpl->set_var("NoTaskRows", "");
    foreach ($tasks as $task) { 
              $tpl->set_var("id_task",$task["id_task"] );
              $tpl->set_var("title",$task["title"] );
              $tpl->set_var("description",$task["description"] );
              $tpl->set_var("status",$task["status"] );
              $tpl->set_var("creation_user_name",$task["creation_user_name"]." " .$task["creation_user_last_name"] );
              $tpl->set_var("due_date",date("d-m-Y", strtotime($task["due_date"])) );
              $tpl->parse("TaskRow", true);
    }
  } else {
      $tpl->set_var("TaskRow", "");
      $tpl->parse("NoTaskRows", false);
  }
  $tpl->pparse("main", false);



?>