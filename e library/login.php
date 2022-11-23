<?php
require 'dbconnect.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$username=$_POST["username"];
$email=$_POST["email"];
$password=$_POST["password"];
$sql="SELECT FROM `users` WHERE username="$username" AND email="$email" AND password="$password"";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num==1)
{
session_start();
header("location:second.php");
}
?>
