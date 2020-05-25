<?php
require "vendor/autoload.php";
require 'include/config.php';
$Aemail = "";
if(isset($_POST['login'])){
  header("Location:login.php");
}

if(isset($_POST['register'])){
  $email  = $_POST['email'];
  $pass   = md5($_POST['pass']);
  $cursor = $collection->find([
    "email" => $email
   ]);
 $count = 0;
 foreach ($cursor as $document => $a) {
   $count = 1;
 }
 if($count==1){
   $Aemail= "a";
 }
 else
 //insert registration data 
 {
    $i = $collection->insertOne(
      ['email' => $email,'pass' => $pass]
    );
    if($i!=NULL){
      $cookie_name = "successful";
      $cookie_value = "1";
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
      header("location:login.php");
    }else{
      printf("Record not inserted");
    }
 }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV Maker | Register</title>
    <!-- Bootstrap core CSS -->
    <link rel="apple-touch-icon" sizes="180x180" href="icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
    <link rel="manifest" href="icon/site.webmanifest">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
  </head>
  <body onload="myLoad()">
  <script>
    function myLoad() {
      document.getElementById("r").disabled = true;
    }
  </script>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="index.php" class="navbar-brand">
            <img src="icon/logo.png" width="160" alt="" class="d-inline-block align-middle mr-2">
          </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center">Register</h1>
          </div>
        </div>
      </div>
    </header>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <form action="#" method = "POST" class="well">
                  <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" id="myInput" oninput="myEmail()" autocomplete = "off" name = "email" class="form-control"
                    value = "<?php
                                if(isset($_POST['submit'])){
                                  echo $_POST['email'];
                                }
                            ?>" 
                    placeholder = "Email"
                    >
                    <div>
                      <label id="emailRed" class="label label-danger"></label>
                      <label id="emailGreen" class="label label-success"></label>
                      
                      <div id = "hideError">
                      <?php 
                        if($Aemail != ""){
                          echo "<label class='label label-danger'>Email Address Already exists</label>";
                        }

                        ?>
                      </div>
                        
                      
                    </div>
                    
                    <script>
                      function myEmail() {
                        var x = document.getElementById("myInput").value;
                        if(x!=""){
                          if(x.match("[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}")){
                            document.getElementById("emailRed").innerHTML = "";
                            document.getElementById("emailGreen").innerHTML = "valid";
                            document.getElementById("hideError").style.display = "none";
                          }else{
                            document.getElementById("emailRed").innerHTML = "not valid ";
                            document.getElementById("emailGreen").innerHTML = "";
                            document.getElementById("r").disabled = true;
                            document.getElementById("hideError").style.display = "none";
                          }
                        }else{
                          document.getElementById("emailRed").innerHTML = "";
                          document.getElementById("emailGreen").innerHTML = "";
                        }
                        
                      }
                    </script>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" Name="pass" id = "p1" oninput="myPass(); myCPass();">
                  
                    <div>
                      <label id="passRed" class="label label-danger"></label>
                      <label id="passGreen" class="label label-success"></label>
                    </div>
                    <script>
                      function myPass() {
                        var y = document.getElementById("p1").value;
                        if(y!=""){
                          if(y.length >= 4){
                            document.getElementById("passRed").innerHTML = "";
                            document.getElementById("passGreen").innerHTML = "valid";
                          }else{
                            document.getElementById("passRed").innerHTML = "Password At least 4 characters ";
                            document.getElementById("passGreen").innerHTML = "";
                            document.getElementById("r").disabled = true;
                          }
                        }else{
                          document.getElementById("passRed").innerHTML = "";
                          document.getElementById("passGreen").innerHTML = "";
                        }
                        
                      }
                    </script>
                  </div>
                  <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Confirm Password" Name="cpass"id = "p2" oninput="myCPass()">
                    <div>
                      <label id="cpassRed" class="label label-danger"></label>
                      <label id="cpassGreen" class="label label-success"></label>
                    </div>
                    <script>
                      function myCPass() {
                        var m = document.getElementById("p1").value;
                        var n = document.getElementById("p2").value;
                        var u = document.getElementById("myInput").value;
                        if(n!=""){
                          if(m===n){
                          document.getElementById("cpassRed").innerHTML = "";
                          document.getElementById("cpassGreen").innerHTML = "Match";
                          if(m!="" && n!="" && u!=""){
                            document.getElementById("r").disabled = false;
                          }
                          
                          }else{
                            document.getElementById("cpassRed").innerHTML = "Not Match";
                            document.getElementById("cpassGreen").innerHTML = "";
                            document.getElementById("r").disabled = true;
                          }
                        }else{
                          document.getElementById("cpassRed").innerHTML = "";
                          document.getElementById("cpassGreen").innerHTML = "";
                        }
                      }
                    </script>
                  </div>
                  <button type="submit" name = "register" class="btn btn-default btn-block" id = "r">Register</button>
                  <button type="submit" name = "login" class="btn btn-default btn-block">Login</button>
              </form>
          </div>
        </div>
      </div>
    </section>

    <div class="footer navbar-fixed-bottom">
      <footer id="footer" class="fixed-bottom">
        <p>Copyright AAKT, &copy; 2020</p>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
