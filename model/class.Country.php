<?php

    include_once(dirname(__FILE__) ."/class.Model.php");

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

