<?php
  include_once("security.php");
  include_once("config.php");
  $tpl->load_file("userdetails/userdetails.html", "main");
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST["action"];
    switch ($action) {
        case "upload":    
          $upload_path = UPLOAD_PATH;
          $fileext =  pathinfo($_FILES["photo"] ["name"], PATHINFO_EXTENSION);
          $upload_file = $upload_path . basename($logged_user . "." . $fileext);
          if (move_uploaded_file($_FILES['photo']['tmp_name'], $upload_file)) {
                    $smt = $conn->prepare("update users set picture = :pic where username = :username");
                    $smt->bindParam("username", $logged_user->username);
                    $smt->bindParam("pic", basename($logged_user->username . "." . $fileext));
                    $smt->execute();           
        } else {
              echo "¡Hubo un error al subir el archivo";
          }
        break;
        case "update":
          $smt = $conn->prepare("select * from users where username=:username");
          $smt->bindParam("username", $logged_user->username);
          $smt->execute();
          $data = $smt->fetch();

          $name = isset($_POST["firstname"])?$_POST["firstname"]:$data["name"];
          $lastname = isset($_POST["lastname"])?$_POST["lastname"]:$data["last_name"];
          $email = isset($_POST["email"])?$_POST["email"]:$data["email"];
          $pwd = $data["pwd"];
          if (isset($_POST["pwd"]) && isset($_POST["pwd"]) && $_POST["pwd"]==$_POST["confpwd"]) {
            $pwd = $_POST["pwd"];
          }
          
          $smt = $conn->prepare("update users set name=:name, last_name=:lastname, email=:email, pwd=:pwd where username = :username");
          $smt->bindParam("username", $logged_user->username);
          $smt->bindParam("name", $name);
          $smt->bindParam("lastname", $lastname);
          $smt->bindParam("email", $email);
          $smt->bindParam("pwd", $pwd);
          $smt->execute();
        break;
    }
}

$sql = "SELECT * FROM users u WHERE u.username = :username";
$stmt = $conn->prepare($sql);
$stmt->bindParam("username", $logged_user->username);
$stmt->execute();
$user = $stmt->fetch();

$tpl->set_var("name", $user["name"]);
$tpl->set_var("last_name", $user["last_name"]);
$tpl->set_var("email", $user["email"]);
$tpl->set_var("pwd", $user["pwd"]);
$tpl->set_var("picture", $user["picture"]);
$tpl->pparse("main", false);
?>