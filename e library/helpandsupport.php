<?php
require 'dbconnect.php';
session_start();
echo('<html>
<head>
<title>Help and support</title>
<link rel="stylesheet" href="helpandsupport.css">
</head>
<body>
<h1><center>Help and support</center></h1>
<button type="submit" name="button" onclick="signout()">Home</button>
<div class="container1">
    <h2>About E-Library</h2>
    <p>Managing books records and collecting books has been a difficult task in past. This web app is simply an attempt to
    simplify this process, here the student can also search the book and librarian will have the records of books that are borrowed.
    <br/><br/>
    This web app behaves differently depending upon whether the user is student or the admin.
    This web app has a admin section where only the librabrian can check the details of students who have borrowed the books. This
    provides the name of the students and the books that he has taken from Library.<br/>
    This web application is built by students of CSE department with support from CSE dept, BMSCE. Please take time to report any
    bugs/typos or any anomalies you encounter. Thank you!!</p>
</div>
<div class="container2">
<center>
<h2>Team members</h2>
</center>
<h4>
<ol>
  <li>Keshav Somani - CSE 072</li>
  <li>Mohammed Abdul Qayyum - CSE 086</li>
  <li>Malatesh Sangamesh Mantur - CSE 081</li>
</ol>
</h4>
</div>
<br/>
<div align="left" style="background-color:#9e9e9e; width:100%; height:130px;">
  <h4 class="h44">
    Explore
    <ul>
      <div class="home" onclick="signout()">
      <li>Home</li>
    </div>
      <div class="help" onclick="help()">
      <li>Help and support</li>
    </div>
  </ul>
  </h4>
  <h4>
    <br>
    Department of Computer Science and Engineering, BMSCE<br/>
    Bull Temple Rd, Basavanagudi, Bengaluru, Karnataka 560004
  </h4>
  <h2 class="bi">E LIBRARY</h2>
</div>
<script type="text/javascript">
function signout()
{
  window.location.href="index.php";
}
function help()
{
  window.location.href="helpandsupport.html";
}
</script>
</body>
</html>');
?>
