<?php
    include_once("db.php");
    include_once("security.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $action = $_POST["action"];
        switch ($action) {
            case "upload":    
              $upload_path = "C:/dev/Apache24/htdocs/test/files/avatar/";
              $fileext =  pathinfo($_FILES["photo"] ["name"], PATHINFO_EXTENSION);
              $upload_file = $upload_path . basename($logged_user . "." . $fileext);
              if (move_uploaded_file($_FILES['photo']['tmp_name'], $upload_file)) {
                        $smt = $conn->prepare("update users set picture = :pic where username = :username");
                        $smt->bindParam("username", $logged_user);
                        $smt->bindParam("pic", basename($logged_user . "." . $fileext));
                        $smt->execute();           
            } else {
                  echo "¡Hubo un error al subir el archivo";
              }
            break;
            case "update":
              $smt = $conn->prepare("select * from users where username=:username");
              $smt->bindParam("username", $logged_user);
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
              $smt->bindParam("username", $logged_user);
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
    $stmt->bindParam("username", $logged_user);
    $stmt->execute();
    $user = $stmt->fetch();



?><BR><BR>
<div class="container">

  <div class="row align-items-center">
    <div class="col-sm-6 offset-sm-3">
      <div class="row">
        <form class="form-horizontal" method="POST">
          <input type="hidden" name="action" value="update"/>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">First Name</label>
            <div class="col-sm-12">
              <input id="firstname" name="firstname" placeholder="Insert your First Name" class="form-control input-md"
                required="" type="text" value="<?=$user["name"]?>">
              <span class="help-block"> </span>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Last Name</label>
            <div class="col-sm-12">
              <input id="lastname" name="lastname" placeholder="Insert your Last Name" class="form-control input-md"
                required="" type="text" value="<?=$user["last_name"]?>">
              <span class="help-block"> </span>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Email</label>
            <div class="col-sm-12">
              <input id="email" name="email" placeholder="Insert your Email" class="form-control input-md"
                required="" type="text" value="<?=$user["email"]?>">
              <span class="help-block"> </span>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Password</label>
            <div class="col-sm-12">
              <input id="pwd" name="pwd" placeholder="Insert your Password" class="form-control input-md"
                required="" type="password" value="<?=$user["pwd"]?>">
              <span class="help-block"> </span>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Confirm Password</label>
            <div class="col-sm-12">
              <input id="confpwd" name="confpwd" placeholder="Confirm your Password" class="form-control input-md"
                required="" type="password" value="<?=$user["pwd"]?>">
              <span class="help-block"> </span>
            </div>
          </div>

         <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"> </label>
            <div class="col-sm-12">
              <button id="btnSend" name="btnSend" class="btn btn-primary">Submit</button>
            </div>
          </div>

          

        </form>

        <form class="form-horizontal" method="POST" name="frmChangeFile" enctype="multipart/form-data">
        <input type="hidden"  name="action" value="upload" />
        <div class="form-group">
          <label class="form-label" for="photo">Photo</label>
             <div class="col-sm-12">
              <input type="file" id="photo" name="photo" class="form-control" id="photo" />
              <span class="help-block"> </span>
            </div>
          </div>
          <img src="files/avatar/<?=$user["picture"]?>" class="img-circle" alt="">
          <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"> </label>
            <div class="col-sm-12">
              <button id="btnUpload" name="btnUpload" class="btn btn-primary">Change Photo</button>
            </div>
          </div>
        </form> 
      </div>
    </div>
  </div>
</div>
</div>