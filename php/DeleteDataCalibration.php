<?php
session_start();
//if not logged in, redirect to LoginPage
/*
if(!isset($_SESSION['username'])){
   header("Location: ../php/LoginPage.php");
}
*/
if($_SESSION["teamtype"] != "Admin"){
header("Location: ../php/HomePage.php");
?>
<!DOCTYPE html>
<!--Calibatrion Info Delete Form  -->
<html lang = "en">
   <head>
<title> PHP Script for Bins Table </title>
<link rel="stylesheet" type="text/css" href="../css/HomePage.css">
<link rel="stylesheet" type="text/css" href="../css/AdminPage.css">
   </head>
<body>
<?php
			    //Create a basic connection
  $connection = include '../php/ConnectDB.php';

echo "*****CONNECTION TO DATABASE SUCCESSFUL*****";



// Get the CID entered by the user in the ID box
$CID = $_POST['CID'];
$CID = stripcslashes($CID);
$CIDU = htmlspecialchars($CID);
//query to select info from Items
$query = "DELETE FROM Calibration WHERE Calibration_ID = '$CIDU'";

//Variable to store query result
$Qresult = mysqli_query($connection, $query);

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
