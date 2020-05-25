<?php
require "vendor/autoload.php";
require 'include/config.php';
// get values

session_start();

if(!isset($_SESSION['login']))
{
  header('location:login.php');  
}

if(!isset($_POST['fname'])){
  header('location:index.php'); 
}else{
  $log = $_SESSION['login'];
  $g = $_POST['gen'];
  $f  = $_POST['fname'];
  $m = $_POST['mname'];
  $l  = $_POST['lname'];
  $d  = date('Y-m-d', strtotime($_POST['birthday']));
  $p  = $_POST['pno'];
  $h  = $_POST['hobbies'];
  $la  = $_POST['lang'];
  $s  = $_POST['skills'];
  $tEdu = $_POST['hEdu'];
  $tExp = $_POST['hExp'];
  $tPro = $_POST['hPro'];
  $tCer  =  $_POST['hCer'];
  $a =$_POST['address'];
  $save = $_POST['save'];

echo $g."<br>";/*
echo $f."<br>";
echo $m."<br>";
echo $l."<br>";
echo $d."<br>";
echo $p."<br>";
echo $h."<br>";
echo $la."<br>";
echo $s."<br>";
echo $tEdu."<br>";
echo $tExp."<br>";
echo $tPro."<br>";
*/

$add = $collection->updateOne(

    ['email'=>$log],                                     //temp leter use session
    ['$set'=>[
        'fname'  => $f,
        'mname'  => $m,
        'lname'  => $l,
        'gender' => $g,
        'date'   => $d,
        'pno'    => $p,
        'hobbies'=> $h,
        'lang'   => $la,
        'skills' => $s,
        'edu'    => $tEdu,
        'exp'    => $tExp,
        'pro'    => $tPro,
        'add'    => $a,
        'cer'    => $tCer
 
    ]]
  );
if(strcmp($save,'save')){
  header('location:create.php');
}else{
  header('location:cv.php');
}


}


?>