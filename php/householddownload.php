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
  <!-- END HEADER: MUST BE ON ALL PAGES -->

<main>
  <div class="center">
  <!-- Main Page HTML goes here -->
  <h1> THIS IS THE DOWNLOAD HOUSEHOLD DATA PAGE </h1>

   <!-- houshold data Checkboxes -->
   <div class = "household">
  <h3> <u>Options: </u></h3>
	<form action="">
		<ul>
			<li><input type="checkbox" name="data" value="1">  View Data in Browser </li>
			<li><input type="checkbox" name="data" value="2">  Download Data File </li>
			<input type="submit"> </br></li>
		</ul>
	</form>
   </div>
    </br></br>
<div class = "bottomBar">
</br></br></br></br>
</br></br></br></br>
</div>

</main>
</div>
</body>

</html>
