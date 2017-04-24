<?php
session_start();
//if not logged in, redirect to LoginPage
/*
if(!isset($_SESSION['username'])){
   header("Location: ../php/LoginPage.php");
}
*/
?>
<!DOCTYPE html>
<!-- Created by: Revision Software -->
<html lang="en">

<head>
  <meta charset="UTF-8">
    <title>ADMIN TABLE ACCESS: ADD/DELETE/VIEW</title>
     <link rel="stylesheet" type="text/css" href="../css/HomePage.css">
     <link rel="stylesheet" type="text/css" href="../css/DownloadPage.css">
</head>

<body>
  <!-- START HEADER: MUST BE ON ALL PAGES -->
  <header>
<div>
  <ul>
    <li><a href="../php/HomePage.php">HOME</a></li>
    <li><a href="../php/DownloadPage.php">DOWNLOAD</a></li>
    <li><a href="../php/Householdlookup.php">HOUSEHOLD LOOKUP</a></li>
    <li><a href="../php/Viewdata.php">VIEW DATA</a></li>
  </ul>
  <ul class="logout">
    <?php if($_SESSION["teamtype"] == "Admin"){ echo '<li><a href="../php/AdminPage.php">ADMINISTRATION</a></li>'; } ?>
    <li><a href="../php/Logout.php">LOGOUT</a></li>
</ul>
</div>
  </header>
  <!-- END HEADER: MUST BE ON ALL PAGES -->

<main>
  <div class="center">
  <!-- Main Page HTML goes here -->
  <h1> Tables: ADD/DELETE </h1>
  <div class="btn-group">
<button class = "button" type="button"><a href="../php/ViewCalibrationData.php"</a>CALIBRATION DATA</button><br>
<button class = "button" type="button"><a href="../php/ViewBinsData.php"</a>BINS DATA</button><br>
  <button class = "button" type="button"><a href="../php/ViewPickupData.php"</a>PICKUP DATA</button><br>
    <button class = "button" type="button"><a href="../php/ViewTruckDataTable.php"</a>TRUCK DATA</button><br>
  </div>
</div>
</main>
</body>

</html>
