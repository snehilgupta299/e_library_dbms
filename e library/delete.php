<?php
session_start();
$x=$_SESSION['username'];
require 'dbconnect.php';
if(isset($_POST['remove']))
{
  $id=$_POST['id'];
  $sql="SELECT * FROM $x WHERE id='$id'";
  $run=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($run);
  $bookname=$row['bookname'];
  $sql="SELECT * FROM `books` WHERE bookname='$bookname'";
  $run=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($run);
  $count=$row['count'];
  $count=$count+1;
  $query="UPDATE `books` SET `count`='$count' WHERE bookname='$bookname' ";
$result=mysqli_query($conn,$query);
if($result)
{
  $sql="DELETE FROM $x WHERE id='$id' ";
  $result=mysqli_query($conn,$sql);
  if($result)
  {
   echo('<script>alert("Data deleted");</script>');
    header("location:cart.php");
  }
  else
   {
    echo('<script>alert("Data is not deleted");</script>');
    header("location:cart.php");

  }
}
}
?>
