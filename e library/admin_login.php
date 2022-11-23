<?php
$x=1;
require 'dbconnect.php';
/*if(isset($_SESSION['loggedin'])==false)
{
  echo('<script>alert("Incorrect password");</script>');
  header("location:index.php");
} */
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    $email=$_POST["email"];
    $password=$_POST["password"];
  $sql="select * from users where email='$email' AND password='$password' AND identity='1'";
  //$sql="Select * from users where username='$username'";
  $result=mysqli_query($conn,$sql);
    $row=mysqli_num_rows($result);//it will return numbers
    if($row==1)
    {
      session_start();
      header("location:admin.php");
}
else
{
    echo('<script>
     var x=confirm("Incorrect password");
     if(x)
     window.location.replace("index.php");
     </script>');
     }

}
 ?>
