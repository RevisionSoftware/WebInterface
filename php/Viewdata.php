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
    <li><a href="../php/AdminPage.php">ADMINISTRATION</a></li>
    <li><a href="../php/LoginPage.php">LOGOUT</a></li>
</ul>
</div>
  </header>
  <!-- END HEADER: MUST BE ON ALL PAGES -->

<main>
  <div class="center">
  <!-- Main Page HTML goes here -->
  <h1> View Data </h1>

   <!-- VIEW data BUTTONS -->
   <div class = "DATA">
  <h3> <u>Options: </u></h3>
	<form action="">
		<ul>

<div class="btn-group">
<button class = "button" type="button"><a href="../php/ViewHouseholdData.php"</a>HOUSEHOLD DATA</button><br>
<button class = "button" type="button"><a href="../php/ViewNeighborhoodData.php"</a>NEIGHBORHOOD DATA</a></button><br>
<button class = "button" type="button"><a href="../php/ViewTruckData.php"</a>TRUCK DATA</button><br>
<button class = "button" type="button"><a href="../php/ViewRouteData.php"</a>ROUTE DATA</button><br>
<button class = "button" type="button"><a href="../php/CompareConditionAverages.php"</a>COMPARE CONDITION AVERAGES</button>
</div>
		</ul>
	</form>
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
