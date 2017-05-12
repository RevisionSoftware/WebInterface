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
    <title>Home Page</title>
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
  <!-- END HEADER: MUST BE ON ALL PAGES -->

<main>
  <div class="center">
  <!-- Main Page HTML goes here -->
  <h1> View Data </h1>

   <!-- VIEW data BUTTONS -->

<div class="btn-group">
<input type="button" onclick="location.href='../php/ViewHouseholdData.php'" value="HOUSEHOLD DATA"> <br><br>
<input type="button" onclick="location.href='../php/ViewNeighborhoodData.php'" value="NEIGHBORHOOD DATA"> <br><br>
<input type="button" onclick="location.href='../php/ViewTruckData.php'" value="TRUCK DATA"> <br><br>
<input type="button" onclick="location.href='../php/ViewRouteData.php'" value="ROUTE DATA"> <br><br>
<input type="button" onclick="location.href='../php/CompareConditionAverages.php'" value="COMPARE CONDITION AVERAGES"> <br><br>
</div>

    </br></br>
<div class = "bottomBar">
</br></br></br></br>
</br></br></br></br>
</div>
</div>
</main>
</body>

</html>
