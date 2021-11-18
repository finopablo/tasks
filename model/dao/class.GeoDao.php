<?php

    include_once(dirname(__FILE__) . "/class.Dao.php");
    include_once(dirname(__FILE__) ."/../class.Country.php");
    include_once(dirname(__FILE__) ."/../class.City.php");

    class GeoDao extends Dao {
        private $userDao;
        // Constructor
        public function __construct($conn){
            parent::__construct($conn);
        }

        public function getCountries() {

           $sql = "SELECT 
                     *
                    FROM 
                    countries c";

            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            $countries = array();
            foreach ($rows as $row) { 
                $country = $this->getCountry($row);
                array_push($countries,$country);
            }            
            return $countries;
            
        }

        public function getCities($countryCode) {

            $sql = "SELECT 
                        *
                     FROM 
                        cities c
                     WHERE
                        c.country_code =  :country_code";
             $stmt = $this->connection->prepare($sql);
             $stmt->bindParam("country_code", $countryCode);
             $stmt->execute();
             $rows = $stmt->fetchAll();
             $cities = array();
             foreach ($rows as $row) { 
                 $city = $this->getCity($row);
                 array_push($cities,$city);
             }            
             return $cities;
             
         }
 


        private function getCity($row) {           
            return new City($row["id_city"],  $row["city_name"]);
        }

        private function getCountry($row) {           
            return new Country($row["country_code"],  $row["country_name"]);
        }



    }

?>