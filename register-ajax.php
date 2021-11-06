<?php
        $completePage = true;
        include_once("config.php");
        include_once("views/class.RegisterView.php");
        $registerView = new RegisterView($tpl);
        $countries = $geoController->getCountries();
        $data = array();
        $data["countries"] = $countries ;
        $data["selectedCountryCode"] = isset($_POST["country"])?$_POST["country"]:$countries[0]->countryCode;
        $data["cities"] = $geoController->getCities($data["selectedCountryCode"]);
        $registerView->show($data);
        
?>