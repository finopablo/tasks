<?php       
    include_once("model/class.User.php");
    include_once("model/class.Task.php");
    include_once("class.BaseView.php");
    class TasksView extends BaseView {
        public function show($tasks) {
            $this->tpl->load_file("tasks.html", "main");
            if (count($tasks)>0 ) {
                $this->tpl->set_var("NoTaskRows", "");
                foreach ($tasks as $task) { 
                          $this->tpl->set_var("id_task",$task->id );
                          $this->tpl->set_var("title",$task->title );
                          $this->tpl->set_var("description",$task->description );
                          $this->tpl->set_var("status",$task->status);
                          $this->tpl->set_var("creation_user_name",$task->creator_user->name ." " .$task->creator_user->lastName);
                          $this->tpl->set_var("due_date",date("d-m-Y", strtotime($task->due_date)) );
                          $this->tpl->parse("TaskRow", true);
                }
              } else {
                  $this->tpl->set_var("TaskRow", "");
                  $this->tpl->parse("NoTaskRows", false);
              }
              $this->tpl->pparse("main", false);
        }
        
    }

?>