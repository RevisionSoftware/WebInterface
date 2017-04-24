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
<!--Item ID search Form  -->
<html lang = "en">
         <head>
<title> PHP Script for Pickup Table </title>
<link rel="stylesheet" type="text/css" href="../Style/view.css">
         </head>
<body>
<?php
//Create a basic connection
$db = mysqli_connect("localhost", "snedd001", "snedd001", "snedd001");

if (!$db) // Check connection if statement
  {
    print "*****CONNECTION TO DATABASE FAILED***** ";exit;
  }
echo "*****CONNECTION TO DATABASE SUCCESSFUL*****";

$snedd001 = mysqli_select_db($db, "snedd001");

if (!$snedd001)//if statement checks the database selected
  {
    print "Error - unable to select from this database.";exit;
  }

//query to select info from Items
$query = "SELECT * FROM Pickup";

//Variable to store query result
$Qresult = mysqli_query($db, $query);

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
</body>
</html>
