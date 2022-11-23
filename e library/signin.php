<?php
require 'dbconnect.php';
$username=$_POST["username"];
$email=$_POST["email"];
$password=$_POST["password"];
if($username==null || $email==null || $password==null)
{
  header("location:index.php");

}
else {
  if( isset($_POST["signin"])=="Signin")
  {
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    $sql="select * from users where username='$username' AND email='$email' AND password='$password'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num>0)
    {
      echo('<script>
       var x=confirm("Already one account exists");
       if(x)
       window.location.replace("index.php");
       </script>');
    }
    else
    {
  $sql="INSERT INTO `users`(`username`, `email`, `password`) VALUES ('$username','$email','$password')";
  $result=mysqli_query($conn,$sql);
  if($result)
  {
  //  $sql="SELECT MAX( `id` ) FROM `$username` ;"
    $sql="CREATE TABLE `sample`.`$username` ( `bookname` varchar(100) NOT NULL ,`subject` varchar(100) NOT NULL,`id` int(5) NOT NULL AUTO_INCREMENT , PRIMARY KEY (`id`),`issuedate`DATE NOT NULL,`returndate` DATE NOT NULL) ENGINE=InnoDB";
    $db=mysqli_query($conn,$sql);
    //$sql="SELECT MAX( `id` ) FROM `$username` ;"
    if($db)
    {
  session_start();
  $_SESSION['username']=$username;
  echo('<script>
   var x=confirm("Once again login with your credentials");
   if(x)
   window.location.replace("index.php");
   </script>');
  header("location:index.php");
  }
  else {
    header("location:index.php");

  }
  }
  else {
    header("location:index.php");
  }
}
  }
  }
  else
  {
    $sql="select * from users where username='$username' AND email='$email' AND password='$password'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num==1)
    {
    session_start();
    $_SESSION['username']=$username;
    header("location:second.php");
    }
    else {
      echo('<script>
       var x=confirm("Invalid credentials");
       if(x)
       window.location.replace("index.php");
       </script>');
    }
    }
}
?>
