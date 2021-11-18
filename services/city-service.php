<?php
    include_once("../config.php");
    $selectedCountry = $_GET["country"];
    $cities = $geoController->getCities($selectedCountry);
    header('Content-type: application/json');
    echo json_encode($cities);
?>