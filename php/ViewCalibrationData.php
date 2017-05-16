<?php
session_start();
//if not logged in, redirect to LoginPage

if(!isset($_SESSION['username'])){
   header("Location: ../php/LoginPage.php");
}

?>
<!DOCTYPE html>
<!-- Created by: Revision Software -->
<html lang="en">

<head>
  <meta charset="UTF-8">
    <title>ADD DATA Page</title>
     <link rel="stylesheet" type="text/css" href="../css/HomePage.css">
     <link rel="stylesheet" type="text/css" href="../css/View.css">
</head>

<body>
  <!-- START HEADER: MUST BE ON ALL PAGES -->
  <header>
<div>
  <ul>
    <li><a href="../php/HomePage.php">HOME</a></li>
    <li><a href="../php/Householdlookup.php">HOUSEHOLD LOOKUP</a></li>
    <li><a href="../php/Viewdata.php">VIEW DATA</a></li>
  </ul>
  <ul class="logout">
    <?php if($_SESSION["teamtype"] == "Admin"){ echo '<li><a href="../php/AdminPage.php">ADMINISTRATION</a></li>'; } ?>
    <li><a href="../php/Logout.php">LOGOUT</a></li>
</ul>
</div>
  </header>

   <body>
     <main>
   <div class = "center">
   <h1> View Calibration Table </h1>

   <!-- Item ID section  -->
<form>
  <div class="btn-group">
 <input type="button" onclick="location.href='../php/ViewCalibrationDataDB.php'" value="CALIBRATION TABLE"> <br><br>
 <?php if($_SESSION["teamtype"] == "Admin"){   ?>
 <input type="button" onclick="location.href='../php/AddData.php'" value="ADD DATA CALIBRATION"><br><br>
 <input type="button" onclick="location.href='../php/DeleteData.php'" value="DELETE DATA CALIBRATION"><br>
 <?php } ?>
</div>

    </form>
      </div>
    </main>
      </body>
</html>
