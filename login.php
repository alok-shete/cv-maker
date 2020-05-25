<?php
require "vendor/autoload.php";
require 'include/config.php';

session_start();
if(isset($_SESSION['login']))
{
  header('location:index.php');  
}
$Aemail = "";
if(isset($_POST['register'])){
  header("Location:register.php");
}
if(isset($_POST['login']))
{
  $cursor = $collection->find([
     "email"    => $_POST['email'],
     "pass" => md5($_POST['pass'])
    ]);
  $s ="";
	$count = 0;
  foreach ($cursor as $document => $a) {
    $s=$a['email'];
    $count = 1;
  }
  if($count==1){
    $_SESSION['login'] = $s;
    header("Location:index.php");
  }else{
    $Aemail = "a";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV Maker | Login</title>
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
      document.getElementById("l").disabled = true;
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
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center"> Login</h1>
          </div>
        </div>
      </div>
    </header>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <form action="#" method = "POST" class="well">
              <?php
                if(isset($_COOKIE["successful"])) { 
                  if($_COOKIE["successful"]=="1") {
                    echo "<div class='alert alert-success'><strong>Success!</strong> You have successfully registered .</div>";
                    
                    $cookie_name = "successful";
                    $cookie_value = "0";
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                  }
                }
              ?>
                  <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" id="myInput" oninput="myEmail();" autocomplete = "off" name = "email" class="form-control"
                    value = "<?php
                                if(isset($_POST['login'])){
                                  echo $_POST['email'];
                                }
                            ?>" 
                    placeholder = "Email"
                    >
                    <div>
                      <label id="emailRed" class="label label-danger"></label>
                      <label id="emailGreen" class="label label-success"></label>
                    </div>
                    
                    <script>
                      function myEmail() {
                        var x = document.getElementById("myInput").value;
                        var n = document.getElementById("pa").value;

                        if(n==""){
                          document.getElementById("l").disabled = true;
                        }
                        
                        if(x!=""){
                          if(x.match("[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}")){
                            document.getElementById("emailRed").innerHTML = "";
                            document.getElementById("emailGreen").innerHTML = "valid";
                            if(n!=""){
                              document.getElementById("l").disabled = false;
                            }
                          }else{
                            document.getElementById("emailRed").innerHTML = "not valid ";
                            document.getElementById("emailGreen").innerHTML = "";
                            document.getElementById("l").disabled = true;
                          }
                        }else{
                          document.getElementById("emailGreen").innerHTML = "";
                          document.getElementById("emailRed").innerHTML = "";
                        }
                      }
                    </script>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" Name="pass" id ="pa" oninput="myEmail()">            
                  </div>
                  <div class="form-group">
                    <?php
                      if($Aemail != ""){
                        echo "<label class='label label-danger'>Email or Password Incorrect</label>";
                      }
                    ?>
                  </div>
                  
                  <button type="submit" name = "login" class="btn btn-default btn-block" id="l">Login</button>
                  <button type="submit" name = "register" class="btn btn-default btn-block">Register</button>
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