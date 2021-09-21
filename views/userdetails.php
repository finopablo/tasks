<?php
    include_once("db.php");
    include_once("security.php");
?><BR><BR>
<div class="container">

  <div class="row align-items-center">
    <div class="col-sm-6 offset-sm-3">
      <div class="row">
      
        <form class="form-horizontal" method="POST" enctype="multipart/form-data">


          <input type="hidden" name="action" value="update"/>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">First Name</label>
            <div class="col-sm-12">
              <input id="firstname" name="firstname" placeholder="Insert your First Name" class="form-control input-md"
                required="" type="text">
              <span class="help-block"> </span>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Last Name</label>
            <div class="col-sm-12">
              <input id="lastname" name="lastname" placeholder="Insert your Last Name" class="form-control input-md"
                required="" type="text">
              <span class="help-block"> </span>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Email</label>
            <div class="col-sm-12">
              <input id="email" name="email" placeholder="Insert your Email" class="form-control input-md"
                required="" type="text">
              <span class="help-block"> </span>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Password</label>
            <div class="col-sm-12">
              <input id="confpwd" name="confpwd" placeholder="Insert your Password" class="form-control input-md"
                required="" type="password">
              <span class="help-block"> </span>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Confirm Password</label>
            <div class="col-sm-12">
              <input id="confpwd" name="confpwd" placeholder="Confirm your Password" class="form-control input-md"
                required="" type="password">
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
          <img src="" class="img-circle" alt="">
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