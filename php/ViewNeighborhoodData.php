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
  <h1> VIEW NEIGHBORHOOD DATA </h1>

<!-- Route Type Checkboxes -->

	   <!-- Account Num  -->
   <div class = "AccNum">
   <h3> <u>By: </u></h3>
		<form action="/action_page.php">
NEIGHBORHOOD CODE: <input type="text" name="FirstName" value=""><br>

</form>


   </div>
<!-- Route Type Checkboxes -->
  <div class = "routeType">
  <h3> <u>VIEW HOUSEHOLD: </u></h3>
	<form action="">
		<ul>
			<li><input type="checkbox" name="BIN IN/OUT" value="1">  BIN IN/OUT </li><br>
			<li><input type="checkbox" name="WEIGHT" value="2">  WEIGHT</li><br>
			<li><input type="checkbox" name="PERCENTAGE" value="3">  PERCENTAGE</li><br>
			<li><input type="checkbox" name="ALL" value="4"> ALL</li><br>
		</ul>

	</form>
   </div>
   </br></br>

   <!-- Waste Type Checkboxes -->
   <div class = "wasteType">
  <h3> <u>WASTE TYPE: </u></h3>
	<form action="">
		<ul>
			<li><input type="checkbox" name="waste" value="1">  Trash </li>
			<li><input type="checkbox" name="waste" value="2">  Recycling </li>
			<li><input type="checkbox" name="waste" value="3">  Green Waste </li>
			<li><input type="checkbox" name="waste" value="4">  ALL </li>
		</ul>
	</form>
   </div>

    </br></br>

	   <!-- Date Range  -->
   <div class = "dateRange">
   <h3> <u>DATE RANGE: </u></h3>
		<form action="">
		<ul>
			<li><input type="checkbox" name="date" value="2">  ALL <br>   	</li>
			 <li>&nbsp;&nbsp; &nbsp;&nbsp;From : <input type="date" name="startDate" max="1979-12-31"> To :
			<input type="date" name="endDate" min="2000-01-02">
			<input type="submit"> </br></li>
	</form>
   </div>




<div class = "bottomBar">
</br></br></br></br>
</br></br></br></br>
</div>
</div>
</main>

</body>

</html>