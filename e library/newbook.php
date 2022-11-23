<?php
session_start();
require 'dbconnect.php';
$_SESSION['flag']="false";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
  $subject=$_POST['select'];
  $x=0;
  foreach($subject as $items)
  {
    $subjectname=$items;
    $x=1;
  }
  if($x==0)
  {
    $_SESSION['flag']="false";
    header("location:admin.php");
    
  }
  else
  {
    $count=$_POST['count'];
    $bookname=$_POST['bookname'];
    $sql="INSERT INTO `books` (`bookname`,`count`,`subject`) VALUES ('$bookname','$count','$subjectname')";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
  $_SESSION['flag']="true";
  header("location:admin.php");
    }
  }

}
?>
