<?php

session_start();

if(!isset($_SESSION['login']))
{
  header('location:login.php');  
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV Maker</title>
    <!-- Bootstrap core CSS -->
    <link rel="apple-touch-icon" sizes="180x180" href="icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
    <link rel="manifest" href="icon/site.webmanifest">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
    

    <style>
      .img-circle {
        border-radius: 50%;
      }
      .center{
        text-align: center;
        align: center;
      }
      table.tCenter {
        margin-left:auto; 
        margin-right:auto;
      }

    </style>
  </head>
  <body>

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
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php"><i class="glyphicon glyphicon-off" style="margin-top: 5px;font-size:28px;"></i></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <br>
    <section id="breadcrumb">
      <div class="container">
        <div class="jumbotron">
          <h1>Welcome</h1>
          <p>Create a CV for your future</p>
          <p><button type="button" class="btn btn-success" onclick="window.location.href='create.php'">Create</button></p>
        </div>
        
      </div>
    </section>

    <section id="breadcrumb">
      <div class="container">
        <div class="row">
          <ol class="breadcrumb">
            <li class="active"><b>Our Team</b></li>
          </ol>
          <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
              <img src="image/alok.png" class="img-circle" alt="Cinque Terre" width="500" height="100">
              <div class="caption">
                
                <h3 class="center"><b>Alok Shete</b></h3>
                <p class="center"><b>Msc(Cs) Student At MIT-WPU</b></p>
                <div>
                  <table class="tCenter">
                    <td width="1%"><a href="https://www.facebook.com/shetealok" target="_blank"><img src="icon/social/fb.png" width="40" height="40"></a></td>
                    <td width="1%"><a href="https://www.instagram.com/alok_shete/" target="_blank"><img src="icon/social/insta.png" width="40" height="40"></a></td>
                    <td width="1%"><a href="https://in.linkedin.com/in/alok-shete" target="_blank"><img src="icon/social/in.png" width="40" height="40"></a></td>
                    <td width="1%"><a href="https://iprogramx.blogspot.com/" target="_blank"><img src="icon/social/blog.png" width="40" height="40"></a></td>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
              <img src="image/amar.png" class="img-circle" alt="Cinque Terre" width="500" height="100">
              <div class="caption">
                
                <h3 class="center"><b>Amar Dhumane</b></h3>
                <p class="center"><b>Msc(Cs) Student At MIT-WPU</b></p>
                <div>
                  <table class="tCenter">
                    <td width="1%"><a href="https://www.facebook.com/ForeshadowPunisher"  target="_blank"><img src="icon/social/fb.png" width="40" height="40"></a></td>
                    <td width="1%"><a href="https://www.instagram.com/goku_immortal/" target="_blank"><img src="icon/social/insta.png" width="40" height="40"></a></td>
                    <td width="1%"><a href="https://www.linkedin.com/in/amar-dhumane-058417192/"   target="_blank"><img src="icon/social/in.png" width="40" height="40"></a></td>
                  </table>
                </div>
               </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
              <img src="image/kaustubh.png" class="img-circle" alt="Cinque Terre" width="500" height="100">
              <div class="caption">
                
                <h3 class="center"><b>Kaustubh Chavan</b></h3>
                <p class="center"><b>Msc(Cs) Student At MIT-WPU</b></p>
                <div>
                  <table class="tCenter">
                    <td width="1%"><a href="https://www.facebook.com/profile.php?id=100008915738598" target="_blank"><img src="icon/social/fb.png" width="40" height="40"></a></td>
                    <td width="1%"><a href="https://www.instagram.com/kaustubh___15/" target="_blank"><img src="icon/social/insta.png" width="40" height="40"></a></td>
                    <td width="1%"><a href="https://www.linkedin.com/in/kaustubh-chavan-9b85b2195/" target="_blank"><img src="icon/social/in.png" width="40" height="40"></a></td>
                  </table>
                </div>
               </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
              <img src="image/tejas.png" class="img-circle" alt="Cinque Terre" width="500" height="120">
              <div class="caption">
                <h3 class="center"><b>Tejas Badhe</b></h3>
                <p class="center"><b>Msc(Cs) Student At MIT-WPU</b></p>
                <div>
                  <table class="tCenter">
                    <td width="1%"><a href="https://www.facebook.com/tejas.badhe.3" target="_blank"><img src="icon/social/fb.png" width="40" height="40"></a></td>
                    <td width="1%"><a href="https://www.instagram.com/tejas_badhe727/" target="_blank"><img src="icon/social/insta.png" width="40" height="40"></a></td>
                    <td width="1%"><a href="https://www.linkedin.com/in/tejas-badhe-4b26631a5/" target="_blank"><img src="icon/social/in.png" width="40" height="40"></a></td>
                  </table>
                </div>
               </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <br/>

    <div>
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
