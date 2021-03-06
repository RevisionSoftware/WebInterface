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
    <title>ADD DATA TRUCK Page</title>
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
  <h1> ADD DATA TRUCK PAGE </h1>
  <h1> ADD Data Components here </h1>
    <form id = "ID" action = "AddDataTruckDB.php" method = "post">
  <fieldset><legend>Product Information</legend>
  <label for="Route_Num">Route_Num: </label>
  <input type="text" name="Route_Num" id="Route_Num" size="15" maxlength="10" placeholder="Enter Route_Num" required> <br>
  <br>
  <label for="Employee_Number">Employee_Number:</label>
  <input type="text" name="Employee_Number" id="Employee_Number" size="15" maxlength="15" placeholder="Enter Employee_Number" required> <br>
  <br>
  <label for="Truck_Type">Truck_Type:</label>
  <input type="text" name="Truck_Type" id="Truck_Type" size="15" maxlength="15" placeholder="Enter Truck_Type" required> <br>
  <br>
  <label for="License_Plate">License_Plate:</label>
  <input type="text" name="License_Plate" id="License_Plate" size="15" maxlength="15" placeholder="Enter License_Plate" required> <br>
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
