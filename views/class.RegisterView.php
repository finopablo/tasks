<?php       
    include_once("class.BaseView.php");
    class RegisterView extends BaseView {
        function show($data) {
            $this->tpl->load_file("userdetails/register-ajax.html", "main");

            $countries = $data["countries"];
            $selectedCountry = $data["selectedCountryCode"];
            $cities = $data["cities"];
            //$userExists = isset($data["existsUser"])? $data["existsUser"]: false;
            //$this->tpl->set_var("emailExists", $userExists?"El usuario ya existe":"");
            foreach ($countries as $country) {
                if ($country->get("countryCode") == $selectedCountry) {
                    $this->tpl->set_var("countrySelected", "selected");
                } else {
                    $this->tpl->set_var("countrySelected", "");
                }
                $this->tpl->set_var("countryCode", $country->get("countryCode"));
                $this->tpl->set_var("countryName", $country->get("countryName"));
                $this->tpl->parse("Country", true);
            }

            foreach ($cities as $city) {
                $this->tpl->set_var("cityId", $city->get("idCity"));
                $this->tpl->set_var("cityName", $city->get("cityName"));
                $this->tpl->parse("City", true);
            }
      //      $this->tpl->set_var("email", $data["email"]);
        //    $this->tpl->set_var("name", $data["name"]);
           // $this->tpl->set_var("last_name", $data["last_name"]);

            $this->tpl->pparse("main", false);   
        }

        private function error($error) {
            return "<div class='alert alert-danger'> $error </span>"; 
        }
    
    }

?>