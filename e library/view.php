<?php
session_start();
require 'dbconnect.php';
echo('<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="icon" href="images/labicon.jpg">
    <link rel="stylesheet" href="view.css">
  </head>
  <style>
  html
  {
    background: url("images/main1.jpg") no-repeat center/cover ;
    background-attachment: fixed;
    font-size:25px;
  }
 input[type="submit"]
 {
   font-size:20px;
   border:2px solid green;
   background-color:#3dff3a;
     margin:33px 0px 25px 0px;
   width:76px;
   height:44px;
 }
 input[type="submit"]:hover
 {
   background-color:white;
   cursor:pointer;
 }
  </style>
  <body>
  <div class="back">
  <form class="" action="admin.php" method="post">
    <input type="submit" name="" value="back">
  </form>
</div>
<div class="container">
<table border="1">
<tr>
<th>subject name</th>
<th>book name</th>
<th>Issue date</th>
<th>Return date</th>
</tr>'
);

if($_SERVER["REQUEST_METHOD"]=="POST")
{
  $name=$_POST['username'];
  $sql="SELECT * FROM $name";
  $result=mysqli_query($conn,$sql);
  if($result)
  {
    $x=0;
    $count=mysqli_num_rows($result);
    while($x<$count)
    {
      echo('<tr>');
      $run=mysqli_fetch_assoc($result);
      echo('<th>'. $run['subject'].'</th>');
      echo('<th>'. $run['bookname'].'</th>');
      echo('<th>'. $run['issuedate'].'</th>');
      echo('<th>'. $run['returndate'].'</th>');

      $x++;
      echo('</tr>');
    }
  }
}
echo('</body></html>');
?>
