<?php   
    include_once("model/dao/class.GeoDao.php");
    include_once("lib/Validator.php");
    include_once("exceptions/class.ValidationException.php");

    class GeoController {

        private $geoDao;

        function __construct($geoDao) {
            $this->geoDao = $geoDao;
        }

        public function getCountries() {
            return $this->geoDao->getCountries();
        }


        public function getCities($countryCode) {
            return $this->geoDao->getCities($countryCode);
        }
}