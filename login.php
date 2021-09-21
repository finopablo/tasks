<html>
<head>
    <title>Tasks System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
</head>

<?php
    include_once("lib/Validator.php");
    include_once("db.php");
    $errors = validate();
?>
<body>
    <div class="container">
        <form method="POST">
            <div class="row align-items-center">
                <div class="col-sm-6 offset-sm-3">
                    <div class="row border">
                        <div class="col-sm-12 text-center"> User Login </div>
                    </div>
                    <div class="row border">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Username </label>
                                    <input type="text" class="form-control" id="username" name="username">
                                    <?=isset($errors["username"])?error($errors["username"]):""?>
                                </div>
                                <div class="mb-3">
                                    <label for="clave" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="pwd" name="pwd">
                                    <?=isset($errors["pwd"])?error($errors["pwd"]):""?>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 offset-sm-4 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Send</button>    
                            </div>
                            <div class="col-sm-2 d-flex justify-content-center">
                                <button type="reset" class="btn btn-primary">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3"> </div>
            </div>
            <div class="row align-items-center">
                <div class="col-sm-6 offset-sm-3">
                        <a href="register.php"> SignUp to the platform</a>
                </div>

            </div>
        </form>
    </div>
</body>

</html>

<?php



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
                    if ($ok) {
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