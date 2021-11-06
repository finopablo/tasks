<?php
        $completePage = true;
        include_once("config.php");
        include_once("views/class.RegisterView.php");
        $registerView = new RegisterView($tpl);
        $countries = $geoController->getCountries();
        $data = array();
        $data["countries"] = $countries ;
        $action = isset($_POST["action"])?$_POST["action"]:"default";
        $data["email"] = isset($_POST["email"])?$_POST["email"]:"";
        $data["last_name"] = isset($_POST["lastname"])?$_POST["lastname"]:"";
        $data["name"] = isset($_POST["firstname"])?$_POST["firstname"]:"";
        switch($action) {     
     
                case "validateUser" : 
                        $email = $_POST["email"];
                        $exists = $userController->existsEmail($email);
                        $data["existsUser"] = true;
                break;
                case "save" : echo "guardar";
        }        
        $data["selectedCountryCode"] = isset($_POST["country"])?$_POST["country"]:$countries[0]->countryCode;
        $data["cities"] = $geoController->getCities($data["selectedCountryCode"]);
        $registerView->show($data);
        
?>