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
<title> PHP Script for Bins Table </title>
<link rel="stylesheet" type="text/css" href="../css/HomePage.css">
<link rel="stylesheet" type="text/css" href="../css/AdminPage.css">
   </head>
<body>
<?php
			     // Create connection
$connection = include '../php/ConnectDB.php';

// Get the Pickup_ID entered by the user in the ID box
$PID = $_POST['PID'];
$PID = stripcslashes($PID);
$PIDU = htmlspecialchars($PID);
//query to select info from Items
$query = "DELETE FROM Pickup WHERE Pickup_ID = '$PIDU'";

//Variable to store query result
$Qresult = mysqli_query($connection, $query);

if(!$Qresult)//if statement for checking query
  {
    print "Error - The query was not successful.";
    $error = mysql_error();//sql error
    print "<p>" . $error . "</p>";
    exit;
  }
 else{print "PICKUP DELETED";}
?>
</body>
</html>
