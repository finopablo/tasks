<?php
    include_once("config.php");
    $action = $_POST["action"];

    switch ($action)
    {
        case "validateEmail" : 
                $exists = $userController->existsEmail($_POST["email"]);
                $data = new stdClass();
                $data->exists = $exists;
                header('Content-type: application/json');
                echo json_encode($data);
         
        break;


    }    

    ?>