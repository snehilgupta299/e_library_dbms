<?php

if(isset($_POST['logout'])=="logout")
{
  header("location:logout.php");
}
else
if(isset($_POST['cred'])=="credentials")
{
  header("location:user_credentials.php");
}
?>
