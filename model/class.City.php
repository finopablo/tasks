<?php

    include_once(dirname(__FILE__) ."/class.Model.php");

    class City extends Model {

        public $cityName;
        public $idCity;
        
        // Constructor
        public function __construct($idCity,$cityName){
            $this->cityName = $cityName;
            $this->idCity = $idCity;
        }
        
    }


?>

