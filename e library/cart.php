<?php
session_start();
require ('dbconnect.php');
$name=$_SESSION['username'];
echo('<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> E Library</title>
    <link rel="icon" href="images/labicon.jpg">
    <link href="https://fonts.googleapis.com/css?family= Courier New" rel="stylesheet"">

<style>

html
{
  background: url("images/newcart.png") no-repeat center/cover;
  z-index:2;
  background-position-y:98px;
  color:#ff5f5f;;
  background-color:black;
 font-family: Arial, Helvetica, sans-serif;
}
nav
{
  z-index:-2;
}
.container
{
  margin:104px 0px 0px 61px;
display:flex;
font-size:30px;
}
.confirm
{
  margin-top:23px;
  margin-left:23px;
}
.remove
{
width:54px;
height:47px;
font-size:20px;
background-color:greenyellow;

}
.remove:hover
{
  background-color:red;
}
input[type="submit"]
{
  background-color:yellow;
  padding:5px;
  cursor:pointer;
  font-size:20px;

}
.mid {
   display: block;
   width: 98vw;
   margin: 29px auto;
   height:65px;
    border: 2px solid green;

}

.navbar {
   display: inline-block;
}

.navbar li {
   display: inline-block;
   font-size: 32px;
}

.navbar li a {
   font-family: Arial, Helvetica, sans-serif;
   text-decoration: none;
   padding: 45px 23px;
  color:#9fff35;;
}
.navbar li a:hover
{
  padding: 45px 23px;
  font-size:30px;
}
    </style>
  </head>
  <body>
');
$books="books";
  $sql="SELECT * FROM `$name` inner join `$books` on  ".$books.".ide=".$name.".id";
  $result=mysqli_query($conn,$sql);
  if($result)
  {
    $y=0;
    $count=mysqli_num_rows($result);
    echo('<div class="mid">
          <ul class="navbar">
              <li><a href="second.php" class="active">Home</a></li>
              <li><a href="helpandsupport.php">About Us</a></li>
              <li><a href="referencesection.php">Reference section</a></li>
              <li><a href="logout.php">Logout</a></li>
          </ul>
      </div>');
    if($count==0)
    {
    echo("no books selected".'<br>');
  //  header("location:index.php");
  echo('<form action="second.php">
<input type="submit" value="back" class="back">
 </form>
  ');
}
  else
  {
    echo('<div class="container">
  <table border="1">
    <tr>
    <th>Subject name</th>
    <th>Book name</th>
    <th>Reamaning books in library</th>
    <th>Issue date</th>
    <th>Return date</th>
    </tr>');
    while($y<$count)
      {
          $row=mysqli_fetch_assoc($result);
          echo('  <tr>
          <th>'.$row['subject'].'</th>
          <th>'.$row['bookname'].'</th>
          <th>'.$row['count'].'</th>
          <form action="delete.php" method="post">
          <th>'.$row['issuedate'].'</th>
          <th>'.$row['returndate'].'</th>
          <th><input type="submit" class="remove" name="remove" value="x"></th>
          <th><input type="hidden" name="id" value="'.($row['id']) .'" ></th>

          </form>
        </tr>');
        $y++;
      }

      echo('</table>
      </div>
      <div class="confirm">
        <form class="confirm" action="second.php" method="post">
          <input type="submit" name="" value="confirm">
        </form>
        </div>
         </body>
        </html>');
  }
}
?>
<!-- <style media="screen">
    html
    {
      background-color:black;
      color: aquamarine;
    }
    header
    {
      background-color:black;
      height:101px;
      display:flex;
      text-align:center;
      justify-content:center;
      box-shadow:0px 0px 32px 3px aquamarine;
  animation:border 5000ms infinite;
    }
    h2
  {
    font-size:36px;
  }
  .container
  {
    margin:104px 0px 0px 61px;
  display:flex;
font-size:35px;
box-shadow:0px 0px 124px 13px #0d4742;
  }
  .remove
  {
  width:120px;
  height:47px;
  font-size:20px;
  background-color:greenyellow;

  }
  .remove:hover
  {
    background-color:red;
  }
  input[type="submit"]
  {
    background-color:yellow;
    padding:5px;
    cursor:pointer;
    font-size:20px;

  }
  @keyframes border
   {
     50%
     {
       box-shadow: #0d4742  0px 0px 32px 3px;
     }
     100%
     {
       box-shadow:aquamarine 0 0 30px 3px;

     }
  }-->
