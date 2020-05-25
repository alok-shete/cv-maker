<?php
require "vendor/autoload.php";
require 'include/config.php';
session_start();

if(!isset($_SESSION['login']))
{
  header('location:login.php');  
}
$cursor = $collection->find([
  "email"    => $_SESSION['login']
 ]);
  $email  ="";
  $lname  ="";
  $mname  ="";
  $mn     ="";
  $fname  ="";
  $dob    ="";
  $pno    ="";
  $hobi   ="";
  $add    ="";
  $lang   ="";
  $skills ="";
  $edu    ="";
  $exp    ="";
  $pro    ="";
  $g      ="";
  $gm     ="";
  $gf     ="";
  $go     ="";
  $tag    ="";
  $cer    ="";

 foreach ($cursor as $document => $a) {
   if(isset($a['lname'])){
    $email  =$a['email'];
    $lname  =$a['lname'];
    $mname  =$a['mname'];
    $fname  =$a['fname'];
    $dob    =$a['date'];
    $pno    =$a['pno'];
    $hobi   =$a['hobbies'];
    $add    =$a['add'];
    $lang   =$a['lang'];
    $skills =$a['skills'];
    $edu    =$a['edu'];
    $exp    =$a['exp'];
    $pro    =$a['pro'];
    $g      =$a['gender'];
    $cer    =$a['cer'];
    $count = 1;
   }
   if(strlen($fname)==0){
    header('location:login.php'); 
  }
   if(strlen($mname)!=0){
     $mname = $mname." ";
   }
   //name
   $name = $fname." ".$mname.$lname;
   $name = ucwords(strtolower($name));

   //language

   $aLang = explode(",",$lang);

   //hobbies

   $aHobbies = explode(",",$hobi);

   //skills
   $aSkills = explode(",",$skills);


   //Edu
   $ArrayEdu = explode("<>",$edu);
   $a = count($ArrayEdu);

   //Exp
   $ArrayExp = explode("<>",$exp);

   //cer
   $ArrayCer = explode("<>",$cer);

   //pro
   $ArrayPro = explode("<>",$pro);
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>CV Maker | Preview</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="icon/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="icon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
  <link rel="manifest" href="icon/site.webmanifest">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">

  
  
  <link href="css/style.css" rel="stylesheet">
  <style>
    th {
      position: relative; 
      font-size: 150% !important;

    }
    td {
      position: relative; 
      font-size: 120% !important;

    }
    hr { 
        position: relative; 
        top: 0px; 
        border: none; 
        height: 5px; 
        background: black; 
        margin-bottom: 5px; 
    } 
    .borderless td, .borderless th {
      border: none  !important;
    }
    div {
      position: relative;
      left: 7px !important;
    }
    .loader {
      position: relative;
      left: 50% !important;
      border: 4px solid #f3f3f3 ;
      border-radius: 50% ;
      border-top: 4px solid green;
      width: 25px;
      height:25px;
      -webkit-animation: spin 1s linear infinite ;
      animation: spin 1s linear infinite ;
    }

    /* Safari */
    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    label{
      line-height: 2 !important;
      font-size :120%  !important;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
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
  <div class="container" id="root">
    <br>
    <div class="col-md-11">  
      <div class="jumbotron">
        <h2><b>
          <?php
          echo $name;
          ?>
        </b></h1>      
      </div>
    </div>
    <div class="col-md-3">
      <div>
        <h3><b>PERSONAL DETAILS</b></h3>
        <hr>
        <table class='table borderless'>
          <tbody>
            <tr>
              <td><i class="glyphicon glyphicon-envelope" style="font-size:25px;"></i></td>
              <td><b><?php echo $email;?></b></td>
            </tr>
            <tr>
              <td><i class="glyphicon glyphicon-phone" style="font-size:25px;"></td>
              <td><b><?php echo $pno;?></b></td>
            </tr>
            <tr>
              <td><i class="glyphicon glyphicon-calendar" style="font-size:25px;"></td>
              <td><b><?php echo $dob;?></b></td>
            </tr>
            <tr>
              <td><i class="glyphicon glyphicon-globe" style="font-size:25px;"></td>
              <td><b><?php echo $add;?></b></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div>
        <h3><b>LANGUAGE</b></h3>
        <hr>
        <?php
          $sLang = "";
          foreach($aLang as $vLang) {
            $sLang = $sLang." <label class='label label-default'>".ucwords(strtolower($vLang))."</label>";
            
          }
          print $sLang;
        ?>
      </div>
      <br>
      <div>
        <h3><b>SKILLS</b></h3>
        <hr>
        <?php
          $sSkills = "";
          foreach($aSkills as $vSkills) {
            $sSkills = $sSkills." <label class='label label-default'>".$vSkills."</label>";
          }
          print $sSkills;
        ?>
        
      </div>
      <br>
      <div>
        <h3><b>HOBBIES</b></h3>
        <hr>
        <?php
          $sHobbies = "";
          foreach($aHobbies as $vHobbies) {
            $sHobbies = $sHobbies." <label class='label label-default'>".$vHobbies."</label>";
          }
          print $sHobbies;
        ?>
        
      </div>
    </div>
    <br>
    <div class="col-md-8">
      <div>
        <?php
          if(count($ArrayEdu)>1){
        ?>
        <h3><b>EDUCATION</b></h3>
        <hr>
        <table class='table borderless'>
          <tbody>
            <tr>
              <th><b>Class</b></th>
              <th><b>Year</b></th>
              <th><b>College Name</b></th>
              <th><b>University</b></th>
              <th><b>Persentage</b></th>
            </tr>
            
            <?php
              for ($i = 0; $i < count($ArrayEdu)-1 ; $i= $i+5) {
            ?>
            <tr>
              <td><b><?php echo $ArrayEdu[$i]; ?></b></td>
              <td><b><?php echo $ArrayEdu[$i+1]; ?></b></td>
              <td><b><?php echo $ArrayEdu[$i+2]; ?></b></td>
              <td><b><?php echo $ArrayEdu[$i+3]; ?></b></td>
              <td><b><?php echo $ArrayEdu[$i+4]; ?></b></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
        <?php
          }
        ?>
      </div>

      <div>
        <?php
          if(count($ArrayExp)>1){
        ?>
        <h3><b>WORK EXPERIENCE</b></h3>
        <hr>
        <table class='table borderless'>
          <tbody>
            <tr>
              <th width="14%"><b>Year</b></th>
              <th><b>Job Title</b></th>
              <th><b>Details</b></th>
            </tr>
            <?php
              for ($i = 0; $i < count($ArrayExp)-1 ; $i= $i+3) {
            ?>
            <tr>
              <td><b><?php echo $ArrayExp[$i]; ?></b></td>
              <td><b><?php echo $ArrayExp[$i+1]; ?></b></td>
              <td><b><?php echo $ArrayExp[$i+2]; ?></b></td>
            </tr>
            <?php
              }
            ?>

          </tbody>
        </table>
        <?php
          }
        ?>
      </div>

      <div>
        <?php
          if(count($ArrayCer)>1){
        ?>
        <h3><b>CERTIFICATES</b></h3>
        <hr>
        <table class='table borderless'>
          <tbody>
            <tr>
              <th><b>Name</b></th>
              <th width="14%"><b>Year</b></th>
              <th><b>Details</b></th>
            </tr>
            <?php
              for ($i = 0; $i < count($ArrayCer)-1 ; $i= $i+3) {
            ?>
            <tr>
              <td><b><?php echo $ArrayCer[$i]; ?></b></td>
              <td><b><?php echo $ArrayCer[$i+1]; ?></b></td>
              <td><b><?php echo $ArrayCer[$i+2]; ?></b></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
        <?php
          }
        ?>
      </div>

      <div>
        <?php
          if(count($ArrayPro)>1){
        ?>
        <h3><b>PERSONAL PROJECTS</b></h3>
        <hr>
        <table class='table borderless'>
          <tbody>
            <tr>
              <th><b>Name</b></th>
              <th><b>technology</b></th>
              <th><b>Details</b></th>
            </tr>
            <?php
              for ($i = 0; $i < count($ArrayPro)-1 ; $i= $i+3) {
            ?>
            <tr>
              <td><b><?php echo $ArrayPro[$i]; ?></b></td>
              <td><b><?php echo $ArrayPro[$i+1]; ?></b></td>
              <td><b><?php echo $ArrayPro[$i+2]; ?></b></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
        <?php
          }
        ?>
      </div>
    </div>
    <div class="col-md-11">
      <h3><b>DECLARATION</b></h3>
        <hr>
        <h4>
          <b>
          I hereby declare that the information given is true on behalf of my knowledge.          
          </b>
        </h4>
      </div>
  </div>
	<br>
	<br>
	<!-- Button to generate PDF. -->
  <div class="container" id="root">
    <div class="col-md-11">
			<div class="col-md-6">
				<button type="button" class="btn btn-success btn-lg btn-block" onclick="test()"><div id="loader"></div><div id ="gPdf">Generate Pdf</div></button>
			</div>
			<div class="col-md-6">
				<button type="button" class="btn btn-secondary btn-lg btn-block" onclick="location.href='create.php'">Edit</button>
			</div>
    </div>
  </div>
<br>
<br>
<div>
  <footer id="footer" >
    <p>Copyright AAKT, &copy; 2020</p>
  </footer>
</div>
    
<script>
  function test() {
    // Get the element.
    var element = document.getElementById('root');
    show()
    // Generate the PDF.
    html2pdf().from(element).set({
      margin: 0,
      filename: 'cv.pdf',
      html2canvas: { scale: 3},
      jsPDF: {orientation: 'portrait', unit: 'in', format: 'A3', compressPDF: true}
    }).save();
    setTimeout(hide, 3000);
  }
  function show(){
    var elem = document.getElementById("loader");
    document.getElementById("gPdf").style.display = "none";
    elem.classList.add("loader");  // Add a loader class
        
  }
  function hide(){
    var elem = document.getElementById("loader");
    document.getElementById("gPdf").style.display = "block";
    elem.classList.remove("loader");
  }
</script>
</body>
<script src="dist/html2pdf.bundle.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>