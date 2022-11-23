<?php
session_start();
/*if(isset($_SERVER['loggedin'])==false)
{
  echo('<script type="text/javascript">
    alert("invalid credentials")
  </script>');
}
if(isset($_SESSION['logged'])=="0")
{
  echo('<script>alert("Incorrect password");</script>');
}

/*if(isset($_SESSION['x'])==true)
{
  echo('<script type="text/javascript">alert("please once again login with your credentials");</script>');
  unset($_SESSION['x']);

} */
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>E-Library</title>
    <link rel="icon" href="images/labicon.jpg">
    <link href='https://fonts.googleapis.com/css?family= Courier New' rel='stylesheet'>

    <link rel="stylesheet" href="style.css">
    <style media="screen">
    .helpsection
    {
      border:3px solid black;
       position:absolute;
       top:16px;
       right:25px;
       width:8w0px;
       height:140px;
     align-items:center;
     padding-left: 12px;
     padding-right:6px;
    }
    .helpsection:hover
    {
      cursor:pointer;
    }
    #img
    {
      width:74px;
      height:74px;
    }
    </style>
  </head>
  <body>
    <div class="marq">
      <marquee width="60%" direction="left">
Login with BMSCE id
</marquee>
    </div>
    <img src="images/collegelogo.jpg" alt="">
    <div id="head">
    <h1>E LIBRARY</h1>
  </div>
<div class="helpsection" onclick="help()">
  <p></p>
  <img id="img" src="images/help.jpg" alt="">
  <h4>Help and support</h4>
</div>

    <div class="container2">
     <h2>Admin portal</h2>
      <form  action="admin_login.php" method="post" >
        <input type="email" name="email" placeholder="Email"><br/>
         <input type="password" name="password" placeholder="password"><br/>
         <input type="submit" class="submit" value="Sign in">
      </form>
   </div>
    <div class="container1">
      <h2>Student portal</h2>
       <form  action="signin.php" method="post">
         <input type="text" name="username" placeholder="Username"><br/>
         <input type="email" name="email" placeholder="Email"><br/>
          <input type="password" name="password" placeholder="password"><br/>
          <div id="entry">
          <input type="submit" class="submit" name="signin" value="Signin">
          <input type="submit" name="login" class="submit"  value="login">
        </form>
      </form>

    </div>
      <script type="text/javascript">
      function help()
      {
        window.location.href="helpandsupport.php";
      }
      </script>


  </body>
</html>
