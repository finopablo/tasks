<?php
        include_once("config.php");
        include_once("views/class.LoginView.php");
        $loginView = new LoginView($tpl);
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
                        try {
                            $user = $userController->login($_POST["username"], $_POST["pwd"]);
                            setupSession($user);
                            header("Location:index.php");
                        } catch(ValidationException $e) {
                            $loginView->show($e->errors);
                        }
        } else {
            $loginView->show(array());
        }

    function setupSession($data) {
        session_start();
        $_SESSION["user"] = serialize($data);
    }

?>