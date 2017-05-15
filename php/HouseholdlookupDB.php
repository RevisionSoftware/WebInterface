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
<!--Item ID search Form  -->
<html lang = "en">
         <head>
<title> PHP Script for Items Table </title>
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
<?php
//Create a basic connection
$connection = include '../php/ConnectDB.php';

if (!$connection) // Check connection if statement
  {
    print "*****CONNECTION TO DATABASE FAILED***** ";exit;
  }
  $HID = $_POST['Account_Num'];
  $HID = stripcslashes($HID);
  $HIDU = htmlspecialchars($HID);

//query to select info from Items
$query = "SELECT * FROM Resident WHERE Account_Num = '$HIDU'";

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
print "<table> <caption> <h1> Household Table: </h1>";
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
$query = "SELECT * FROM Bins WHERE Account_Num = '$HIDU'";

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
print "<table> <caption> <h1> Bins Table: </h1>";
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

$query = "SELECT * FROM Pickup WHERE Account_Num = '$HIDU'";

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
print "<table> <caption> <h1> Pickup Table: </h1>";
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
 $setExcelName = "HouseholdTable";
 $setSql = "SELECT * FROM Resident;";
 $setSql2 = "SELECT * FROM Bins";
 $setSql3 = "SELECT * FROM Pickup";
 $setRec1 = mysqli_query($setSql1);
 $setRec2 = mysqli_query($setSql1);
 $setRec3 = mysqli_query($setSql3);
 $setCounter1 = mysqli_num_fields($setRec1);
 $setCounter2 = mysqli_num_fields($setRec2);
 $setCounter3 = mysqli_num_fields($setRec3);

for ($i = 0; $i < $setCounter1; $i++) {
    $setMainHeader1 .= mysqli_field_name($setRec1, $i)."t";
}
for ($i = 0; $i < $setCounter2; $i++) {
    $setMainHeader2 .= mysqli_field_name($setRec2, $i)."t";
}
for ($i = 0; $i < $setCounter3; $i++) {
    $setMainHeader3 .= mysqli_field_name($setRec3, $i)."t";
}

while($rec = mysqli_fetch_row($setRec1))  {
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


$setCounter1 = mysqli_num_fields($setRec1);

while($rec = mysqli_fetch_row($setRec2))  {
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


$setCounter2 = mysqli_num_fields($setRec2);

while($rec = mysqli_fetch_row($setRec3))  {
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


$setCounter3 = mysqli_num_fields($setRec3);
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
