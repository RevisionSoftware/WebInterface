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
    <title>Home Page</title>
     <link rel="stylesheet" type="text/css" href="../css/HomePage.css">
     <link rel="stylesheet" type="text/css" href="../css/DataForm.css">
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
  <div class="centered">
  <!-- Main Page HTML goes here -->
  <h1> LOOKUP HOUSEHOLD PAGE </h1>

<!-- Route Type Checkboxes -->

	   <!-- Account Num  -->
   <div class = "AccNum">
   <h3> <u>Search by: </u></h3>
		<form id = "ID" action = "HouseholdlookupDB.php" method = "post">
Resident ID: <input type="text" name="Resident_ID" id = "Resident_ID" value=""><br>
<input type="submit" value="Submit">
</form>
   </div>
<div class = "bottomBar">
</br></br></br></br>
</br></br></br></br>
</div>

</main>
</div>
</body>

</html>
