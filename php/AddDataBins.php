<?php
session_start();
//if not logged in, redirect to LoginPage
if(!isset($_SESSION['username'])){
   header("Location: ../php/LoginPage.php");
}

if($_SESSION["teamtype"] != "Admin"){
header("Location: ../php/HomePage.php");
}
?>
<!DOCTYPE html>
<!-- Created by: Revision Software -->
<html lang="en">

<head>
  <meta charset="UTF-8">
    <title>ADD DATA BINS Page</title>
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
  <h1> ADD DATA BINS PAGE </h1>
  <h1> ADD Data Components here </h1>
  <form id = "ID" action = "AddDataBinsDB.php" method = "post">
  <fieldset><legend>Product Information</legend>
  <label for= "RFID">RFID_TAG:</label>
  <input type="text" name="RFID" id="RFID" size="20" maxlength= "30" placeholder="Enter RFID" autofocus required> <br>
  <br>
  <label for= "Pickup_ID">Pickup_ID_TAG:</label>
  <input type="text" name="Pickup_ID" id="Pickup_ID" size="20" maxlength= "30" placeholder="Enter Pickup_ID" autofocus required> <br>
  <br>
  <label for="Account_Num">Account_Num: </label>
  <input type="text" name="Account_Num" id="Account_Num" size="15" maxlength="10" placeholder="Enter Account_Num" required> <br>
  <br>
  <label for="Resident_ID">Resident_ID:</label>
  <input type="text" name="Resident_ID" id="Resident_ID" size="15" maxlength="15" placeholder="Enter Resident_ID" required> <br>
  <br>
  <label for="Resident_ID">Trash_Type:</label>
  <select name="Bin_Type">
      <option value="Trash" name="Trash">Trash</option>
      <option value="Recycle" name="Recycle">Recycle</option>
      <option value="Green Waste" name="Green Waste">Green Waste</option>
    </select>
  <br>
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
