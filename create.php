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
  $lname  ="";
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
  $add    ="";
  $cer    ="";

 foreach ($cursor as $document => $a) {
   if(isset($a['lname'])){
    $lname=$a['lname'];
  $mn     =$a['mname'];
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

  if($g=="Female"){
    $gf = "selected = 'selected'";
  }elseif($g=="Male"){
    $gm = "selected = 'selected'";
  }elseif($g=="Other"){
    $go = "selected = 'selected'";
  }
  $count = 1;
   }
   $s="";
   if(strlen($fname)==0){
     $s = "";
    }else{
      if(strlen($mn)==0){
        $s = "onload='onLoad()'";
      }else{
        $s = "onload='onFullLoad()'";
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
    <title>CV Maker</title>
    <link rel="shortcut icon" href="icon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
    <link rel="manifest" href="icon/site.webmanifest">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery1.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap-tagsinput.css">  
    <script src="js/bootstrap-tagsinput.min.js"></script>
    
  </head>
  <body <?php echo $s; ?>>
    <script>
      function onLoad(){
        gender();
        fName();
        lName();
        dob(event)
        pNo();
        add();
      }
      function onFullLoad(){
        gender();
        fName();
        lName();
        mName();
        dob(event);
        pNo();
        add();
      }
    </script>
    <input type="hidden" id="dEdu" value= "<?php echo $edu;?>" name="dEdu">
    <input type="hidden" id="dExp" value= "<?php echo $exp;?>" name="dExp">
    <input type="hidden" id="dPro" value= "<?php echo $pro;?>" name="dPro">
    <input type="hidden" id="dCer" value= "<?php echo $cer;?>" name="dCer">

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

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Create <small>Add Info</small></h1>
          </div>  
        </div>
      </div>
    </header>
    <form action="add.php" method = "POST" class="well" id = "sub" onsubmit="return allVali()" >
      <section id="breadcrumb">
        <div class="container">
          <ol class="breadcrumb">
            <li class="active">Personal Info</li>
          </ol>
          <div class="row">
            <div class="col-md-3">
              <label>Gender</label><span style="color:red;font-size: 16px;"><sup>*</sup></span>
              <select class="form-control" id="gen" name="gen" onchange="gender()">        
                <option value = "">Select Gender</option>
                <option value = "Male" <?php echo $gm;?>>Male</option>
                <option Value = "Female" <?php echo $gf;?>>Female</option>
                <option Value = "Other" <?php echo $go;?>>Other</option>
              </select>
              <div>
                <label id="sRed" class="label label-danger"></label>
                <label id="sGreen" class="label label-success"></label>
              </div>
            </div>

            <script>
              function gender() {
                var x = document.getElementById("gen").value;
                if(x == ""){
                  document.getElementById("sRed").innerHTML = "Not Valid";
                  document.getElementById("sGreen").innerHTML = "";
                  return 0;
                }else{
                  document.getElementById("sRed").innerHTML = "";
                  document.getElementById("sGreen").innerHTML = "Valid";
                  return 1;
                }
              }
            </script>

            <div class="col-md-3">
              <label>First Name</label><span style="color:red;font-size: 16px;"><sup>*</sup></span>
              <input type="text" class="form-control" placeholder="First Name" name = "fname" id = "fN" 
              value= "<?php echo $fname;?>" oninput="fName()">
              <div>
                <label id="fNRed" class="label label-danger"></label>
                <label id="fNGreen" class="label label-success"></label>
              </div>
            </div>

            <!--First Name Validation -->

            <script>
              function fName(){
                var fN = document.getElementById("fN").value;
                if(fN==""){
                  document.getElementById("fNRed").innerHTML = "Not Valid";
                  document.getElementById("fNGreen").innerHTML = "";
                  return 0;
                }else{
                  document.getElementById("fNRed").innerHTML = "";
                  document.getElementById("fNGreen").innerHTML = "Valid";
                  return 1;
                }
              }

            </script>

            <div class="col-md-3">
              <label>Middle Name</label>
              <input type="text" class="form-control" placeholder="First Name" name = "mname" id = "mN" 
              value='<?php echo $mn;?>' oninput="mName()">
              <div>
                <label id="mNRed" class="label label-danger"></label>
                <label id="mNGreen" class="label label-success"></label>
              </div>
            </div>
              <!----  middle name validation----->
            <script>
              function mName(){
                var mN = document.getElementById("mN").value;
                if(mN==""){
                  document.getElementById("mNRed").innerHTML = "Not Valid";
                  document.getElementById("mNGreen").innerHTML = "";
                }else{
                  document.getElementById("mNRed").innerHTML = "";
                  document.getElementById("mNGreen").innerHTML = "Valid";
                }
              }

            </script>
            <div class="col-md-3">
              <label>Last Name</label><span style="color:red;font-size: 16px;"><sup>*</sup></span>
              <input type="text" class="form-control" placeholder="Last Name" oninput = "lName()" value="<?php echo $lname;?>" name = "lname" id="lN" required>
              <div>
                <label id="lNRed" class="label label-danger"></label>
                <label id="lNGreen" class="label label-success"></label>
              </div>
            </div>

            <!--Last Name Validation -->

            <script>
              function lName(){
                var lN = document.getElementById("lN").value;
                if(lN==""){
                  document.getElementById("lNRed").innerHTML = "Not Valid";
                  document.getElementById("lNGreen").innerHTML = "";
                  return 0;
                }else{
                  document.getElementById("lNRed").innerHTML = "";
                  document.getElementById("lNGreen").innerHTML = "Valid";
                  return 1;
                }
              }

            </script>
          </div>
          <br>
          <div class="row">
            <div class="col-md-4">
              <label>Date Of Birthday</label><span style="color:red;font-size: 16px;"><sup>*</sup></span>
              <input type="date" id="birthday" name="birthday" onchange="dob(event)" value="<?php echo $dob;?>"class="form-control"> 
              <div>
                <label id="bRed" class="label label-danger"></label>
                <label id="bGreen" class="label label-success"></label>
              </div>
            </div>
            <!--dob Validation -->

            <script>
              function dob(e){
                if(e.target.value==""){
                  document.getElementById("bRed").innerHTML = "Not Valid";
                  document.getElementById("bGreen").innerHTML = "";
                  return 0;
                }else{
                  document.getElementById("bRed").innerHTML = "";
                  document.getElementById("bGreen").innerHTML = "Valid";
                  return 1;
                }
              }

            </script>
            <div class="col-md-4">
              <label>Contact No.</label><span style="color:red;font-size: 16px;"><sup>*</sup></span><br>
              <input type="tel" class="form-control" placeholder="Phone Number" oninput = "pNo()" value="<?php echo $pno;?>"id ="pno" name = "pno" required>
              <div>
                <label id="pRed" class="label label-danger"></label>
                <label id="pGreen" class="label label-success"></label>
              </div> 
            </div>

            <!--- contact validation  -->
            <script>
              function pNo(){
                var p = document.getElementById("pno").value;
                var regxP = /[7-9]\d{9}/;
                if(regxP.test(p) && p.length==10){
                  document.getElementById("pRed").innerHTML = "";
                  document.getElementById("pGreen").innerHTML = "Valid";
                  return 1;
                }else{
                  document.getElementById("pRed").innerHTML = "Not Valid";
                  document.getElementById("pGreen").innerHTML = "";
                  return 0;
                }
              }

            </script>


            <div class="col-md-4 ">
              <label>Hobbies</label><span style="color:red;font-size: 16px;"><sup>*</sup></span><br>
              <input type="text" data-role = "tagsinput"  placeholder="Add tags" id="h" onchange="hobi()" value="<?php echo $hobi;?>"name ="hobbies" required>
              <div>
                <label id="hRed" class="label label-danger"></label>
                <label id="hGreen" class="label label-success"></label>
              </div>
            </div>
          </div>


          <!--hobbies Validation -->
          <script>
            function hobi(){
                var hh = document.getElementById("h").value;
                if(hh==""){
                  document.getElementById("hRed").innerHTML = "Not Valid";
                  document.getElementById("hGreen").innerHTML = "";
                  return 0;
                }else{
                  document.getElementById("hRed").innerHTML = "";
                  document.getElementById("hGreen").innerHTML = "Valid";
                  return 1;
                }
            }
          </script>


          <br>
          <div class="row">
            <div class="col-md-4">
              <label>Address</label><span style="color:red;font-size: 16px;"><sup>*</sup></span>
              <textarea class="form-control" placeholder="Address" rows="3" name = "address" id="a"oninput="add()" required><?php echo $add;?></textarea>
              <div>
                <label id="aRed" class="label label-danger"></label>
                <label id="aGreen" class="label label-success"></label>
              </div>
            </div>

            <!-- address Validation -->

            <script>
              function add(){
                var aa = document.getElementById("a").value;
                if(aa==""){
                  document.getElementById("aRed").innerHTML = "Not Valid";
                  document.getElementById("aGreen").innerHTML = "";
                  return 0;
                }else{
                  document.getElementById("aRed").innerHTML = "";
                  document.getElementById("aGreen").innerHTML = "Valid";
                  return 1;
                }
              }

            </script>
            <div class="col-md-4">
              <label>Language</label><span style="color:red;font-size: 16px;"><sup>*</sup></span><br>
              <input type="text" data-role = "tagsinput" placeholder="Add tags" onchange="lan()"value="<?php echo $lang;?>"id="la" name = "lang" required>
              <div>
                <label id="lRed" class="label label-danger"></label>
                <label id="lGreen" class="label label-success"></label>
              </div>
            </div>

            <!--language Validation -->
          <script>
            function lan(){
                var la = document.getElementById("la").value;
                if(la==""){
                  document.getElementById("lRed").innerHTML = "Not Valid";
                  document.getElementById("lGreen").innerHTML = "";
                  return 0;
                }else{
                  document.getElementById("lRed").innerHTML = "";
                  document.getElementById("lGreen").innerHTML = "Valid";
                  return 1;
                }
            }
          </script>

            <div class="col-md-4">
              <label>Skills</label><span style="color:red;font-size: 16px;"><sup>*</sup></span><br>
              <input type="text" data-role = "tagsinput" placeholder="Add tags" onchange="ski()" value="<?php echo $skills;?>"id ="sk" name = "skills" required>
              <div>
                <label id="ssRed" class="label label-danger"></label>
                <label id="ssGreen" class="label label-success"></label>
              </div>
            </div>
            <!--hobbies Validation -->
            <script>
              function ski(){
                var ss = document.getElementById("sk").value;
                if(ss==""){
                  document.getElementById("ssRed").innerHTML = "Not Valid";
                  document.getElementById("ssGreen").innerHTML = "";
                  return 0;
                }else{
                  document.getElementById("ssRed").innerHTML = "";
                  document.getElementById("ssGreen").innerHTML = "Valid";
                  return 1;
                }
            }
          </script>

          </div>
          <br>
        </div>
      </section>

      <section id="breadcrumb">
        <div class="container">
          <ol class="breadcrumb">
            <li class="active">Eduction Info</li>
          </ol>
          <script type="text/javascript">
              $(function () {
                  //Build an array containing Customer records.
                  var ArrayEdu = new Array();
                  var dEdu     = document.getElementById("dEdu").value;
                  ArrayEdu = dEdu.split("<>")
                  //AddEdu the data rows.
                  for (var i = 0; i < ArrayEdu.length-1 ; i=i+5) {
                      AddRowEdu(ArrayEdu[i], ArrayEdu[i+1], ArrayEdu[i+2], ArrayEdu[i+3],ArrayEdu[i+4]);   
                  }
              });
      
              function AddEdu() {
                  AddRowEdu($("#txtClass").val(), $("#txtEYear").val(), $("#txtCollage").val(),$("#txtUni").val() ,$("#txtPer").val());
                  $("#txtEYear").val("");
                  $("#txtClass").val("");
                  $("#txtCollage").val("");
                  $("#txtUni").val("");
                  $("#txtPer").val("");
                  showTable();
              };
      
              function AddRowEdu(aa,bb,cc,dd,ee) {
                  //Get the reference of the Table's TBODY element.
                  var tBody = $("#tblEdu > TBODY")[0];
      
                  //AddEdu Row.
                  row = tBody.insertRow(-1);
      
                  //AddEdu class cell.
                  var cell = $(row.insertCell(-1));
                  cell.html(aa);
                  
                  //AddEdu year cell.
                  cell = $(row.insertCell(-1));
                  cell.html(bb);

                  //AddEdu collage cell.
                  cell = $(row.insertCell(-1));
                  cell.html(cc);

                  //AddEdu University cell.
                  var cell = $(row.insertCell(-1));
                  cell.html(dd);
      
                  //AddEdu percent cell.
                  cell = $(row.insertCell(-1));
                  cell.html(ee);
      
                  //AddEdu Button cell.
                  cell = $(row.insertCell(-1));
                  var btnRemoveEdu = $("<input />");
                  btnRemoveEdu.attr("type", "button");
                  btnRemoveEdu.attr("class","btn btn-default btn-block");
                  btnRemoveEdu.attr("onclick", "RemoveEdu(this);");
                  btnRemoveEdu.val("Remove");
                  cell.append(btnRemoveEdu);
                  showTable();
              };
      
              function RemoveEdu(button) {
                  //Determine the reference of the Row using the Button.
                  var row = $(button).closest("TR");
                  var name = $("TD", row).eq(0).html();
                  if (confirm("Do you want to delete: " + name)) {
      
                      //Get the reference of the Table.
                      var table = $("#tblEdu")[0];
      
                      //Delete the Table row using it's Index.
                      table.deleteRow(row[0].rowIndex);
                      showTable();
                  }
              };
              function ValiEdu(){
                var cl = document.getElementById("txtClass").value;
                var yy = document.getElementById("txtEYear").value;
                var coll = document.getElementById("txtCollage").value;
                var uni = document.getElementById("txtUni").value;
                var per = document.getElementById("txtPer").value;

                if(cl!=""&&coll!=""&&uni!=""&&per!=""&&yy!=""){
                  AddEdu();
                  document.getElementById("eduRed").innerHTML = "";
                }else{
                  document.getElementById("eduRed").innerHTML = "Please fill in the required fields";
                }
              };
          </script>
          <table id="tblEdu" class="table table-striped">
              <thead>
                  <tr>
                      <th scope="col">Class</th>
                      <th scope="col">Year</th>
                      <th scope="col">College Name</th>
                      <th scope="col">University</th>
                      <th scope="col">Percentage</th>
                  </tr>
              </thead>
              <tbody>
              </tbody>
              <tfoot>
                  <tr>
                      <td><input type="text" id="txtClass" class="form-control"/></td>
                      <td><input type="text" id="txtEYear" class="form-control"/></td>
                      <td><input type="text" id="txtCollage" class="form-control"/></td>
                      <td><input type="text" id="txtUni" class="form-control"/></td>
                      <td><input type="text" id="txtPer" class="form-control"/></td>
                      <td style= "width: 10%;"><input type="button"  onclick="ValiEdu()" value="ADD" class="btn btn-default btn-block" /></td>
                  </tr>
              </tfoot>
              <label id="eduRed" class="label label-danger"></label>
          </table>
          <script>
            function showTable() {  
              // Education table data
              var nEdu = document.getElementById("tblEdu").rows.length -1;
              var iEdu = 0;
              var strEdu = "";
            
              for(iEdu = 1;iEdu<nEdu;iEdu++){
                  var cEdu = document.getElementById("tblEdu").rows[iEdu].cells;
                  var dEdu = document.getElementById("tblEdu").rows[iEdu].cells.length - 1;
                  for(jEdu = 0; jEdu < dEdu;jEdu++){
                    strEdu = strEdu + cEdu[jEdu].innerHTML + "<>";
                }
              }
              document.getElementById("hEdu").setAttribute('value',strEdu);
              //Experi table data
              var nExp = document.getElementById("tblExp").rows.length -1;
              var iExp = 0;
              var strExp = "";
            
              for(iExp = 1;iExp<nExp;iExp++){
                  var cExp = document.getElementById("tblExp").rows[iExp].cells;
                  var dExp = document.getElementById("tblExp").rows[iExp].cells.length - 1;
                  for(jExp = 0; jExp < dExp;jExp++){
                    strExp = strExp + cExp[jExp].innerHTML + "<>";
                }
              }
              document.getElementById("hExp").setAttribute('value',strExp);
              //project Table Data
              var nPro = document.getElementById("tblPro").rows.length -1;
              var iPro = 0;
              var strPro = "";
            
              for(iPro = 1;iPro<nPro;iPro++){
                  var cPro = document.getElementById("tblPro").rows[iPro].cells;
                  var dPro = document.getElementById("tblPro").rows[iPro].cells.length - 1;
                  for(jPro = 0; jPro < dPro;jPro++){
                    strPro = strPro + cPro[jPro].innerHTML + "<>";
                }
              }
              document.getElementById("hPro").setAttribute('value',strPro);
              //Certificate Table Data
              var nCer = document.getElementById("tblCer").rows.length -1;
              var iCer = 0;
              var strCer = "";
            
              for(iCer = 1;iCer<nCer;iCer++){
                  var cCer = document.getElementById("tblCer").rows[iCer].cells;
                  var dCer = document.getElementById("tblCer").rows[iCer].cells.length - 1;
                  for(jCer = 0; jCer < dCer;jCer++){
                    strCer = strCer + cCer[jCer].innerHTML + "<>";
                }
              }
              document.getElementById("hCer").setAttribute('value',strCer);
            }
          </script>
          <input type="hidden" id="hEdu" name="hEdu">
        </div>
      </section>

      <section id="breadcrumb">
        <div class="container">
          <ol class="breadcrumb">
            <li class="active">Experience Info</li>
          </ol>
          <script type="text/javascript">
              $(function () {
                  //Build an array containing Customer records.
                  var ArrayExp = new Array();
                  var dExp     = document.getElementById("dExp").value;
                  ArrayExp = dExp.split("<>")
                  //AddExp the data rows.


                  for (var i = 0; i < ArrayExp.length-1 ; i=i+3) {
                      AddRowExp(ArrayExp[i], ArrayExp[i+1],ArrayExp[i+2]);   
                  }
              });
          
              function AddExp() {
                  AddRowExp($("#txtYear").val(), $("#txtJob").val(), $("#txtExp").val());
                  $("#txtYear").val("");
                  $("#txtJob").val("");
                  $("#txtExp").val("");
                  showTable();
              };
          
              function AddRowExp(aa,bb,cc) {
                  //Get the reference of the Table's TBODY element.
                  var tBody = $("#tblExp > TBODY")[0];
          
                  //AddExp Row.
                  row = tBody.insertRow(-1);
          
                  //AddExp year cell.
                  var cell = $(row.insertCell(-1));
                  cell.html(aa);
          
                  //AddExp job cell.
                  cell = $(row.insertCell(-1));
                  cell.html(bb);

                  //AddExp detaills cell.
                  cell = $(row.insertCell(-1));
                  cell.html(cc);
          
                  //AddExp Button cell.
                  cell = $(row.insertCell(-1));
                  var btnRemoveExp = $("<input />");
                  btnRemoveExp.attr("type", "button");
                  btnRemoveExp.attr("class","btn btn-default btn-block");
                  btnRemoveExp.attr("onclick", "RemoveExp(this);");
                  btnRemoveExp.val("Remove");
                  cell.append(btnRemoveExp);
                  showTable();
              };
          
              function RemoveExp(button) {
                  //Determine the reference of the Row using the Button.
                  var row = $(button).closest("TR");
                  var name = $("TD", row).eq(0).html();
                  if (confirm("Do you want to delete: " + name)) {
          
                      //Get the reference of the Table.
                      var table = $("#tblExp")[0];
          
                      //Delete the Table row using it's Index.
                      table.deleteRow(row[0].rowIndex);
                      showTable();
                  }
              };
              function ValiExp(){
                var ye = document.getElementById("txtYear").value;
                var ex = document.getElementById("txtExp").value;
                var jj = document.getElementById("txtJob").value;
                if(ye!=""&&ex!=""&&jj!=""){
                  AddExp();
                  document.getElementById("expRed").innerHTML = "";
                }else{
                  document.getElementById("expRed").innerHTML = "Please fill in the required fields";
                }
              };
              
          </script>
          <table id="tblExp" class="table table-striped">
              <thead>
                  <tr>
                      <th scope="col" style="width: 20%;">Year</th>
                      <th scope="col" style="width: 30%;">Job Tilte</th>
                      <th scope="col"style="width: 50%; ">Work Details</th>
                  </tr>
              </thead>
              <tbody>
              </tbody>
              <tfoot>
                  <tr>
                      <td><input type="text" id="txtYear" class="form-control"/></td>
                      <td><input type="text" id="txtJob" class="form-control"/></td>
                      <td><input type="text" id="txtExp" class="form-control"/></td>
                      <td style="width: 10%;"><input type="button" onclick="ValiExp()" value="ADD" class="btn btn-default btn-block" /></td>
                  </tr>
              </tfoot>
              <label id="expRed" class="label label-danger"></label>
          </table>
          <input type="hidden" id="hExp" name="hExp">
        </div>

      </section>

      <section id="breadcrumb">
        <div class="container">
          <ol class="breadcrumb">
            <li class="active">Project Info</li>
          </ol>
          
            <script type="text/javascript">
                $(function () {
                  //Build an array containing Customer records.
                  var ArrayPro = new Array();
                  var dPro     = document.getElementById("dPro").value;
                  ArrayPro = dPro.split("<>")
                  //AddEdu the data rows.


                  for (var i = 0; i < ArrayPro.length-1 ; i=i+3) {
                      AddRowPro(ArrayPro[i], ArrayPro[i+1], ArrayPro[i+2]);   
                  }
              });
            
                function AddPro() {
                    AddRowPro($("#txtName").val(), $("#txtTech").val(), $("#txtPro").val());
                    $("#txtName").val("");
                    $("#txtTech").val("");
                    $("#txtPro").val("");
                    document.getElementById("txtTech").removeAtrribute("value");
                    showTable();
                };
            
                function AddRowPro(aa,bb,cc) {
                    //Get the reference of the Table's TBODY element.
                    var tBody = $("#tblPro > TBODY")[0];
            
                    //AddPro Row.
                    row = tBody.insertRow(-1);
            
                    //AddPro class cell.
                    var cell = $(row.insertCell(-1));
                    cell.html(aa);
            
                    //AddPro collage cell.
                    cell = $(row.insertCell(-1));
                    cell.html(bb);

                    cell = $(row.insertCell(-1));
                    cell.html(cc);
            
                    //AddPro Button cell.
                    cell = $(row.insertCell(-1));
                    var btnRemovePro = $("<input />");
                    btnRemovePro.attr("type", "button");
                    btnRemovePro.attr("class","btn btn-default btn-block");
                    btnRemovePro.attr("onclick", "RemovePro(this);");
                    btnRemovePro.val("Remove");
                    cell.append(btnRemovePro);
                    showTable();
                };
            
                function RemovePro(button) {
                    //Determine the reference of the Row using the Button.
                    var row = $(button).closest("TR");
                    var name = $("TD", row).eq(0).html();
                    if (confirm("Do you want to delete: " + name)) {
            
                        //Get the reference of the Table.
                        var table = $("#tblPro")[0];
            
                        //Delete the Table row using it's Index.
                        table.deleteRow(row[0].rowIndex);
                        showTable();
                    }
                };
                function ValiPro(){
                var nam = document.getElementById("txtName").value;
                var tech = document.getElementById("txtTech").value;
                var pro = document.getElementById("txtPro").value;

                if(nam!=""&&tech!=""&&pro!=""){
                  AddPro();
                  document.getElementById("proRed").innerHTML = "";
                }else{
                  document.getElementById("proRed").innerHTML = "Please fill in the required fields";
                }
              };
            </script>
            <table id="tblPro" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" style="width: 200px;">Name</th>
                        <th scope="col" style="width: 200px;">technology</th>
                        <th scope="col">Project Detail</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <tr>
                        <td><input type="text" id="txtName" class="form-control"/></td>
                        <td><input type="text" data-role = "tagsinput" class="form-control" id="txtTech" value="" placeholder="Add tags"></td>
                        <td><input type="text" id="txtPro" class="form-control"/></td>
                        <td style= "width: 10%;"><input type="button" onclick="ValiPro()" value="ADD" class="btn btn-default btn-block" /></td>
                    </tr>
                </tfoot>
                <label id="proRed" class="label label-danger"></label>
            </table>
            <input type="hidden" id="hPro" name="hPro">
        </div>
      </section>
      <section id="breadcrumb">
        <div class="container">
          <ol class="breadcrumb">
            <li class="active">Certification Info</li>
          </ol>
          <script type="text/javascript">
              $(function () {
                  //Build an array containing Customer records.
                  var ArrayCer = new Array();
                  var dCer     = document.getElementById("dCer").value;
                  ArrayCer = dCer.split("<>")
                  //AddCer the data rows.


                  for (var i = 0; i < ArrayCer.length-1 ; i=i+3) {
                      AddRowCer(ArrayCer[i], ArrayCer[i+1],  ArrayCer[i+2]);   
                  }
              });
          
              function AddCer() {
                  AddRowCer($("#txtCYear").val(), $("#txtCName").val(), $("#txtCDet").val());
                  $("#txtCYear").val("");
                  $("#txtCName").val("");
                  $("#txtCDet").val("");
                  showTable();
              };
          
              function AddRowCer(aa,bb,cc) {
                  //Get the reference of the Table's TBODY element.
                  var tBody = $("#tblCer > TBODY")[0];
          
                  //AddCer Row.
                  row = tBody.insertRow(-1);
          
                  //AddCer class cell.
                  var cell = $(row.insertCell(-1));
                  cell.html(aa);
          
                  //AddCer collage cell.
                  cell = $(row.insertCell(-1));
                  cell.html(bb);

                  //AddCer collage cell.
                  cell = $(row.insertCell(-1));
                  cell.html(cc);
          
                  //AddCer Button cell.
                  cell = $(row.insertCell(-1));
                  var btnRemoveCer = $("<input />");
                  btnRemoveCer.attr("type", "button");
                  btnRemoveCer.attr("class","btn btn-default btn-block");
                  btnRemoveCer.attr("onclick", "RemoveCer(this);");
                  btnRemoveCer.val("Remove");
                  cell.append(btnRemoveCer);
                  showTable();
              };
          
              function RemoveCer(button) {
                  //Determine the reference of the Row using the Button.
                  var row = $(button).closest("TR");
                  var name = $("TD", row).eq(0).html();
                  if (confirm("Do you want to delete: " + name)) {
          
                      //Get the reference of the Table.
                      var table = $("#tblCer")[0];
          
                      //Delete the Table row using it's Index.
                      table.deleteRow(row[0].rowIndex);
                      showTable();
                  }
              };
              function ValiCer(){
                var cye = document.getElementById("txtCYear").value;
                var cex = document.getElementById("txtCName").value;

                if(cye!=""&&cex!=""){
                  AddCer();
                  document.getElementById("CerRed").innerHTML = "";
                }else{
                  document.getElementById("CerRed").innerHTML = "Please fill in the required fields";
                }
              };
              
          </script>
          <table id="tblCer" class="table table-striped">
              <thead>
                  <tr>
                      <th scope="col" style="width: 20%;"> Year</th>
                      <th scope="col"style="width: 30%; ">Name</th>
                      <th scope="col"style="width: 50%; ">Details</th>
                  </tr>
              </thead>
              <tbody>
              </tbody>
              <tfoot>
                  <tr>
                      <td><input type="text" id="txtCYear" class="form-control"/></td>
                      <td><input type="text" id="txtCName" class="form-control"/></td>
                      <td><input type="text" id="txtCDet" class="form-control"/></td>
                      <td style="width: 10%;"><input type="button" onclick="ValiCer()" value="ADD" class="btn btn-default btn-block" /></td>
                  </tr>
              </tfoot>
              <label id="CerRed" class="label label-danger"></label>
          </table>
          <input type="hidden" id="hCer" name="hCer">
        </div>

      </section>
      <section id="breadcrumb">
        <div class="container">
          <button type="submit" class="btn btn-success btn-lg btn-block">Save</button>
          <input type="hidden" id="save" name="save" value="">
        </div>
      </section>
    </form>
		<section id="breadcrumb">
      <div class="container">
				<br>
        <input type="button" class="btn btn-success btn-lg btn-block" onclick ="print1();" value = "Preview & Download">
      </div>
    </section>
    <script>
    	function print1(){
        var x = document.getElementById("gen").value;
    		if (x!="" && fName()==1 && lName()==1 && dob(event)==1 && pNo()==1 && add()==1 && lan()==1 && ski()==1 && hobi()==1) {
          document.getElementById("save").value = "save";
          document.getElementById("sub").submit();
          //alert("okk");
        }else{
          window.scrollTo(0, 0);
          gender();
          fName();
          lName();
          dob(event)
          pNo();
          add();
          lan();
          ski();
          hobi();
          alert("fail");
        }
    	}
      function allVali(){
        var x = document.getElementById("gen").value;
        if (x!="" && fName()==1 && lName()==1 && dob(event)==1 && pNo()==1 && add()==1 && lan()==1 && ski()==1 && hobi()==1) {
        }else{
          window.scrollTo(0, 0);
          gender();
          fName();
          lName();
          dob(event)
          pNo();
          add();
          lan();
          ski();
          hobi();
          alert("fail");
          return false;
        } 
      }
    </script>

    <div>
      <footer id="footer" class="fixed-bottom">
        <p>Copyright AAKT, &copy; 2020</p>
      </footer>
    </div>
    <!--- disable enter submit--->
    <script>
    $('form').bind("keypress", function(e) {
      if (e.keyCode == 13) {               
        e.preventDefault();
        return false;
      }
    });
    </script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
