<?php       
    include_once("class.BaseView.php");
    class LoginView extends BaseView {
        function show($errors) {
            $this->tpl->load_file("login.html", "main");
            $this->tpl->set_var("errorUsername", isset($errors["username"])?$this->error($errors["username"]):"");
            $this->tpl->set_var("errorPassword" , isset($errors["pwd"])?$this->error($errors["pwd"]):""); 
            $this->tpl->pparse("main", false);   
        }


        private function error($error) {
            return "<div class='alert alert-danger'> $error </span>"; 
        }
    
    }

?>\