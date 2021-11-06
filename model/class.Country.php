<?php

    include_once("model/class.Model.php");

    class Country extends Model {

        public $countryName;
        public $countryCode;
        
        // Constructor
        public function __construct($countryCode,$countryName){
            $this->countryName = $countryName;
            $this->countryCode = $countryCode;
        }
        
    }


?>

