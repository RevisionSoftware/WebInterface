<!DOCTYPE html>
<!--Calibatrion Info Delete Form  -->
<html lang = "en">
   <head>
<title> PHP Script for Bins Table </title>
<link rel="stylesheet" type="text/css" href="../css/HomePage.css">
<link rel="stylesheet" type="text/css" href="../css/AdminPage.css">
<link rel="stylesheet" type="text/css" href="../css/Modal.css">
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


// Get the CID entered by the user in the ID box
$CID = $_POST['CID'];
$CID = stripcslashes($CID);
$CIDU = htmlspecialchars($CID);
//query to select info from Items
$query = "DELETE FROM Calibration WHERE Calibration_ID = '$CIDU'";

//Variable to store query result
$Qresult = mysqli_query($db, $query);

if(!$Qresult)//if statement for checking query
  {
    print "Error - The query was not successful.";
    $error = mysql_error();//sql error
    print "<p>" . $error . "</p>";
    exit;
  }
 else{print "INFO DELETED";}
?>
</body>
</html>
