<?php

class Player {
        public $number;
        public $name;
        public $last_name;

        public function __construct($number, $name, $last_name){
            $this->number 			= $number;
            $this->name 			= $name;
            $this->last_name        = $last_name;
            
        }
    
}
?>