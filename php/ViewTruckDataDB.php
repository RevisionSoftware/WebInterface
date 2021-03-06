<?php
session_start();
//if not logged in, redirect to LoginPage

if(!isset($_SESSION['username'])){
   header("Location: ../php/LoginPage.php");
}

?>
<!DOCTYPE html>
<!--Item ID search Form  -->
<html lang = "en">
         <head>
<title> PHP Script for Truck Table </title>
<link rel="stylesheet" type="text/css" href="../css/HomePage.css">
<link rel="stylesheet" type="text/css" href="../css/DownloadPage.css">
         </head>
<body>
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
<?php
//Create a basic connection
$connection = include '../php/ConnectDB.php';

if (!$connection) // Check connection if statement
  {
    print "*****CONNECTION TO DATABASE FAILED***** ";exit;
  }


//query to select info from Items
$query = "SELECT * FROM Truck";

//Variable to store query result
$Qresult = mysqli_query($connection, $query);

if(!$Qresult)//if statement for checking query
  {
    print "Error - The query was not successful.";
    $error = mysql_error();//sql error
    print "<p>" . $error . "</p>";
    exit;
  }

// Display the results in a table
print "<div>";
print "<table> <caption> <h1> Truck Table: </h1>";
print "<tr align = 'center'>";


$n_rows = mysqli_num_rows($Qresult);// Number of rows var

if($n_rows > 0)
  {
    // Get the first row of the result
    $firstRow = mysqli_fetch_assoc($Qresult);

    // Get the number of fields in the result
    $num_fields = mysqli_num_fields($Qresult);

    // Get the column names
    $CNames = array_keys($firstRow);

    // Display column names as appropriate column headers
    for($i = 0; $i < $num_fields; $i++)
      {
	print "<th>" . $CNames[$i] . "</th>";
      }
    print "</tr>";

    // Display the values of rows
    for($row_num = 0; $row_num < $n_rows; $row_num++)
      {
	print "<tr>";
	$values = array_values($firstRow);
	for($i = 0; $i < $num_fields; $i++)
	  {
	    $value = htmlspecialchars($values[$i]);
	    print "<td>" . $value . "</td>";
	  }
	print "</tr>";// End row
	$firstRow = mysqli_fetch_assoc($Qresult);//next row
      }
  }
 else//else statement if nothing is inputed or false
   {
     print "<td> *****NO TABLE DATA*****.</td> <br />";
   }

// Close table
print "</table>";
print "</div>";
?>
<form method="post">
<input type="submit" name="submit" value="Download" class="submit"</input>
</form>
<?php
 if(isset($_POST['submit'])){
   Download();
 }

function Download(){

$setCounter = 0;
$setExcelName = "TruckTable";
$setSql = "SELECT * FROM Truck";
$setRec = mysqli_query($setSql);
$setCounter = mysqli_num_fields($setRec);

for ($i = 0; $i < $setCounter; $i++) {
    $setMainHeader .= mysqli_field_name($setRec, $i)."t";
}

while($rec = mysqli_fetch_row($setRec))  {
  $rowLine = '';
  foreach($rec as $value)       {
    if(!isset($value) || $value == "")  {
      $value = "t";
    }   else  {
//It escape all the special charactor, quotes from the data.
      $value = strip_tags(str_replace('"', '""', $value));
      $value = '"' . $value . '"' . "t";
    }
    $rowLine .= $value;
  }
  $setData .= trim($rowLine)."n";
}
  $setData = str_replace("r", "", $setData);


$setCounter = mysqli_num_fields($setRec);
//This Header is used to make data download instead of display the data

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$setExcelName."_Report.xls");
header("Pragma: no-cache");
header("Expires: 0");


}
?>
</main>
</body>
</html>
