<?php
session_start();
require 'dbconnect.php';
$x=$_SESSION['username'];
$_SESSION['subject']="COA";
echo('<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> E Library-');
    echo($_SESSION['username']);
    echo('</title>
    <link rel="stylesheet" href="list.css">
    <link rel="icon" href="images/labicon.jpg">
  </head>
  <body>');
?>
<h1>Computer organization and architecture</h1>
<div class="list">
<ol>
 <?php
 $sql="SELECT * FROM `books` where subject='coa'";
$result=mysqli_query($conn,$sql);
if($result)
{
  $count=mysqli_num_rows($result);
  if($count==0)
  {
  echo("NO BOOKS AT PRESENT");
}
  else {
    $x=0;
    echo('<form class="" action="process.php" method="post"><ol>');

    while($x<$count)
    {
      $row=mysqli_fetch_assoc($result);
      echo('<li><input type="checkbox" name="books[]" value="'.$row['bookname'].'">'.$row['bookname']);
    //   echo($row['bookname']);
       echo('</li>');
      $x++;
  }
  echo('
     </ol>
     </div>
     <input type="submit" class="update" name="save_multiple" value="Update"/>
     <input type="reset" class="reset" value="Reset"/>
   </form>
    </body>
  </html>');
}
}


 ?>
