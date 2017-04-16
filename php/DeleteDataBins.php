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
    <title>DELETE DATA BINS Page</title>
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

<main>
  <div class="center">
  <!-- Main Page HTML goes here -->
  <h1> DELETE DATA BINS PAGE </h1>
  <h1> Delete Data Components here </h1>
  <form id = "ID" action = "DeleteDataBinsDB.php" method = "post">
  <fieldset><legend>Product Information</legend>
  <label for= "RFID">RFID_TAG:</label>
  <input type="text" name="RFID" id="RFID" size="20" maxlength= "30" placeholder="Enter RFID" autofocus required> <br>
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
