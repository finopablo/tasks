<?php

    include_once("model/class.Model.php");

    class User extends Model {

        public $username;
        public $name;
        public $lastName;
        public $userType;
        public $status;
        public $email;
        public $picture;

        

        // Constructor
        public function __construct($username,$name,$lastName,$userType,$status,$email,$picture){

            $this->username = $username;
            $this->name = $name;
            $this->lastName = $lastName;
            $this->userType = $userType;
            $this->status = $status;
            $this->email = $email;
            $this->picture = $picture;
        }
        
    }


?>

