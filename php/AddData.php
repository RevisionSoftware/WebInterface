<?php
session_start();
//if not logged in, redirect to LoginPage
/*
if(!isset($_SESSION['username'])){
   header("Location: ../php/LoginPage.php");
}
*/
if($_SESSION["teamtype"] != "Admin"){
header("Location: ../php/HomePage.php");
}
?>
<!DOCTYPE html>
<!-- Created by: Revision Software -->
<html lang="en">

<head>
  <meta charset="UTF-8">
    <title>ADD DATA Page</title>
     <link rel="stylesheet" type="text/css" href="../css/HomePage.css">
     <link rel="stylesheet" type="text/css" href="../css/DownloadPage.css">
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

<main>
  <div class="center">
  <!-- Main Page HTML goes here -->
  <h1> ADD DATA PAGE </h1>
  <h1> ADD Data Components here </h1>
  <form id = "ID" action = "AddDataCalibration.php" method = "post">
  <fieldset><legend>Product Information</legend>
  <label for= "CID">Calibration_ID:</label>
  <input type="text" name="CID" id="CID" size="15" maxlength= "20" placeholder="Enter Calibration_ID" autofocus required> <br>
  <br>
  <label for="RFID">RFID_Tag: </label>
  <input type="text" name="RFID" id="RFID" size="15" maxlength="20" placeholder="Enter RFID_Tag" required> <br>
  <br>
<br>
  <label for="TruckID">TruckID: </label>
  <input type="text" name="TruckID" id="TruckID" size="15" maxlength="20" placeholder="Enter TruckID" required> <br>
  <br>

  <label for="Coefficient">Coefficient: </label>
  <input type="text" name="Coefficient" id="Coefficient" size="15" maxlength="20" placeholder="Enter Coefficient" required> <br>
  <br>
  <label for="Weight">Weight:</label>
  <input type="text" name="Weight" id="Weight" size="15" maxlength="20" placeholder="Enter Weight" required> <br>
  <br>
  <label for= "Start">Start_Time:</label>
  <input type="text" name="Start" id="Start" size="15" maxlength= "20" placeholder="Enter Start_Time" required> <br>
  <br>
  <label for="Stop">Stop_Time:</label>
  <input type="text" name="Stop" id="Stop" size="15" maxlength="20" placeholder="Enter Stop_Time" required> <br>
  <br>
  <label for="Date">Date_Time:</label>
  <input type="text" name="Date" id="Date" size="15" maxlength="20" placeholder="Enter Date_Time" required> <br>
  <br>

  <INPUT type="submit" id="submit" value="Submit"/>
  <INPUT type="submit" id="submit" value="Clear"/>
  </fieldset>
  <br>
  </form>
</div>
</main>
</body>

</html>
