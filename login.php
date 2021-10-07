<?php
    include_once("lib/Validator.php");
    include_once("db.php");
    include_once("lib/class.Templates.php");
    $errors = validate();
    $tpl = new Templates("./html");
    $tpl->load_file("login.html", "main");
    $tpl->set_var("errorUsername", isset($errors["username"])?error($errors["username"]):"");
    $tpl->set_var("errorPassword" , isset($errors["pwd"])?error($errors["pwd"]):""); 
    $tpl->pparse("main", false);   

    function validate() {
        global $conn;
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
                    $validator = new Validator($_POST);
                    $validator->required("You must supply an username")->validate("username","username");
                    $validator->required("You must supply an password")->validate("pwd","pwd");
                    if ($validator->hasErrors()) {
                        return $validator->getAllErrors();
                    } else {        
                        $stmt = $conn->prepare("SELECT * FROM users where username = :username and pwd = :pwd and status ='confirmed'");
                        $stmt->bindParam(":username", $_POST["username"]);
                        $stmt->bindParam(":pwd", $_POST["pwd"]);
                        $ok = $stmt->execute();
                        if (($ok) && ($stmt->rowCount() == 1)) {
                            setupSession($stmt->fetchAll());
                            header("Location:index.php");
                        } else {
                            $errors = array();
                            $errors["pwd"] = "Username and password combination does not exists";
                            return $errors;
                        }
                    }
        }
        return array();
    
    }


    function error($error) {
        return "<div class='alert alert-danger'> $error </span>"; 
    }


    function setupSession($data) {
        session_start();
        if (count($data)==1) {
            $row = $data[0];
        }
        $_SESSION["username"] = $row["username"];
    }



?>