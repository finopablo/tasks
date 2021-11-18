<?php

include_once(dirname(__FILE__) ."/class.Model.php");

class Task extends Model {

    public $id;
    public $assigned_user; //User 
    public $creator_user; //Username
    public $status;
    public $title;
    public $description;
    public $due_date;
    public $last_update;

    

    // Constructor
    public function __construct($id, $assigned_user, $creator_user, $status, $title, $description, $due_date, $last_update){
        $this->id =  $id;
        $this->assigned_user = $assigned_user;
        $this->creator_user = $creator_user;
        $this->status = $status;
        $this->title = $title;
        $this->description = $description;
        $this->due_date = $due_date;
        $this->last_update = $last_update;
    }
    
}



?>