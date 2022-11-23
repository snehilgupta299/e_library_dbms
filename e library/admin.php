<?php
require 'dbconnect.php';
session_start();
$sql="SELECT * FROM users WHERE identity='0'";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
$_SESSION['logged']=true;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>E Library</title>
  <link rel="icon" href="images/labicon.jpg">
  <link href='https://fonts.googleapis.com/css?family= Courier New' rel='stylesheet'>
<link rel="stylesheet" href="admin.css">
</head>

<body>
  <div class="imp">
  <div class="main">
    <div class="info">
      <div class="content">
      <img src="images/admin.jpg" alt="">
      <h1>&nbsp;&nbsp;&nbsp;Admin Panel</h1>
      </div>
      <div class="cont">
          <p>Total number of users registered&nbsp<?php echo $count ?></p>
          <div class="">
        <button type="submit"  class="cred" name="cred"value="credentials"onclick="usercred()">credentials</button>
        <button type="submit" class="logout" name="logout" value="logout" onclick="logout()">logout</button>
      </div>
      </div>
    </div>
    <div class="list">
      <h2>Students list</h2>
    <?php
    $x=0;
      $_SESSION['loggedin']=true;
    while($x<$count)
    {
      $row=mysqli_fetch_assoc($result);
      $name=$row['username'];
      $sql="SELECT * FROM $name";
      $run=mysqli_query($conn,$sql);
      if($run)
      {
      $bookcount=mysqli_num_rows($run);
      $row=mysqli_fetch_assoc($run);
      $issuedate=$row['issuedate'];
      $returndate=$row['returndate'];
      $section=$row['section'];
      $sql="SELECT * FROM $name WHERE subject='wad'";
      $run=mysqli_query($conn,$sql);
      $wadcount=mysqli_num_rows($run);
      $sql="SELECT * FROM $name WHERE subject='dsc'";
      $run=mysqli_query($conn,$sql);
      $dsccount=mysqli_num_rows($run);
      $sql="SELECT * FROM $name WHERE subject='oops'";
      $run=mysqli_query($conn,$sql);
      $oopscount=mysqli_num_rows($run);
      $sql="SELECT * FROM $name WHERE subject='os'";
      $run=mysqli_query($conn,$sql);
      $oscount=mysqli_num_rows($run);
      $sql="SELECT * FROM $name WHERE subject='maths'";
      $run=mysqli_query($conn,$sql);
      $matcount=mysqli_num_rows($run);
      $sql="SELECT * FROM $name WHERE subject='coa'";
      $run=mysqli_query($conn,$sql);
      $coacount=mysqli_num_rows($run);
      echo('<div class="entries">
        <div class="first">
          <div class="name">
          <h2>Student name:'.$name.'</h3>
        </div>
        <div class="section">
          <h3>Section:C</h3>
        </div>
        </div>
        <p id="bookcount">Total number of books collected:'.$bookcount.'</p>
        <div class="datesection">
          <p >Issue date:&nbsp'.$issuedate.' </p>
          <p>Return date:&nbsp'.$returndate.' </p>
        </div>
        <div class="last">
          <div class="countsection">
            <div id="subcount">
              <p>WAD:&nbsp'.$wadcount.'&nbspbooks selected</p>
            </div>
            <div id="subcount">
              <p>DSC:&nbsp'.$dsccount.'&nbspbooks selected</p>
            </div>
             <div id="subcount">
                <p>OOPS:&nbsp'.$oopscount.'&nbspbooks selected</p>
              </div>
              <div id="subcount">
                  <p>OS:&nbsp'.$oscount.'&nbspbooks selected</p>
                </div>
                 <div id="subcount">
                    <p>MATHS:&nbsp'.$matcount.'&nbspbooks selected</p>
                  </div>
                  <div id="subcount">
                     <p>COA:&nbsp'.$coacount.'&nbspbooks selected</p>
                   </div>
          </div>
          <div >
          <form action="view.php" method="post">
      <input type="hidden" name="username" value="'.$name.'">
      <input type="submit" class="view" value="view">
      </form>
        </div>
        </div>
      </div>');
     
      }
      else
      echo mysqli_error($conn);
      $x++;
    }
    ?>
      <!--end of entries -->
    </div>
      </div>
    <div class="bookadd">
<h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Book addition</h2>
<form class="" action="newbook.php" method="post">
<div class="subselect">
  <div class="eachselect">
    <input type="radio" name="select[]" value="wad">WAD
  </div>
  <div class="eachselect">
    <input type="radio" name="select[]" value="maths">MATHS
  </div>
  <div class="eachselect">
    <input type="radio" name="select[]" value="dsc">DSC
  </div>
  <div class="eachselect">
    <input type="radio" name="select[]" value="oops">OOPS
  </div>
  <div class="eachselect">
    <input type="radio" name="select[]" value="os">OS
  </div>
  <div class="eachselect">
    <input type="radio" name="select[]" value="coa">COA
  </div>
</div>
<input type="text" name="bookname" value="" placeholder="Add book name">
<br/>
<div>
<input type="number" name="count" placeholder="Count">
</div>
<input type="submit" class="add" name="button" value="Add">
</form>
<button type="submit" class="help" name="button"onclick="help()">Help and support</button>
    </div>
  </div>
  <?php
  if(isset($_SESSION['flag'])=="true")
  {
echo('<script type="text/javascript">
  alert("New book added");
</script>');
  }
  ?>

  <script type="text/javascript">
    function add()
    {
      window.location.href="add.php";
    }
    function help()
    {
      window.location.href="helpandsupport.php";
    }
    function logout()
    {
      window.location.href="logout.php";
    }
    function usercred()
    {
      window.location.href="credentials.php";
    }
    </script>
</body>
</html>
