<?php
session_start();
require 'dbconnect.php';
$x=$_SESSION['username'];
if(isset($_SESSION['status']))
{
  header("Refresh: 0; url=second.php");
  echo('<script type="text/javascript">
    alert("'.$_SESSION['status'].'")
  </script>');
  //header("location:index.php");
//  echo"<h4>".$_SESSION['status']."</h4>";
  unset($_SESSION['status']);
  die;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" style="background:url('images/dashboard.jpg')no-repeat center center/cover">
  <head>
    <meta charset="utf-8">
    <title> E Library-<?php echo $x; ?></title>
    <link rel="icon" href="images/labicon.jpg">
    <link rel="stylesheet" href="second.css">
  </head>
  <body>
     <h1>Book categories</h1>
     <button type="submit" name="button" onclick="signout()">Sign out</button>
     <button class="cart" onclick="cart()">
        <img src="images/cart.jpg" alt="">
          CART
     </button>
      <div class="container1">
        <div class="wad" onclick="wad()">
          <h3 class="box">Web application development</h3>
        </div>
        <div class="oops" onclick="oop()">
          <h3 class="box">Object oriented programming</h3>
        </div>
        <div class="dsc" onclick="dsc()">
          <h3 class="box">Data structures with C</h3>
        </div>
         </div>
         <br/>
         <div class="container2">
        <div class="os" onclick="os()">
          <h3 class="box">Operating system</h3>
        </div>
        <div class="coa" onclick="coa()">
          <h3 class="box">Computer organizations and architecture</h3>
        </div>
        <div class="maths" onclick="mat()">
          <h3 class="box">Stastics and discrete mathematics</h3>
        </div>
      </div>
    <script type="text/javascript">
      function wad()
      {
        window.location.href="wad.php";
      }
      function oop()
      {
        window.location.href="oop.php";
      }
       function dsc()
        {
          window.location.href="dsc.php";
        }
         function os()
          {
            window.location.href="os.php";
          }
            function coa()
            {
              window.location.href="coa.php";
            }
             function mat()
              {
                window.location.href="mat.php";
              }
              function cart()
              {
                window.location.href="cart.php";
              }
              function signout()
              {

                window.location.href="logout.php";
              }
    </script>
  </body>
</html>
