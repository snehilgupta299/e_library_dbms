<?php
session_start();
require 'dbconnect.php';
$x=$_SESSION['username'];
$y=$_SESSION['subject'];
$i=date("Y/m/d");
$d=strtotime("+1 Months");
$r=date("Y/m/d",$d);
if(isset($_POST['save_multiple']))
{
  $books=$_POST['books'];
  foreach($books as $item)
  {
    $sql="INSERT INTO `$x` (`bookname`,`subject`,`issuedate`,`returndate`)VALUES ('$item','$y','$i','$r')";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
      $sql="SELECT * FROM `books` WHERE bookname='$item'";
      $run=mysqli_query($conn,$sql);
      $row=mysqli_fetch_assoc($run);
      $count=$row['count'];
      $count=$count-1;
    $query="UPDATE `books` SET `count`='$count' WHERE bookname='$item' ";
    $result=mysqli_query($conn,$query);
  }
}
  if($result)
  {
    //echo("inserted successfully".'<br>');
    $_SESSION['status']="inserted sucessfully";
    header("location:second.php");
  }
  else {
    $_SESSION['status']="No books selected";
    header("location:second.php");

  //  echo("Failed to insert".'<br>');
  }
}


 ?>
<!--<script type="text/javascript">
  alert("")
</script>
