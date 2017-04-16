<!DOCTYPE html>
<!--Item ID search Form  -->
<html lang = "en">
   <head>
<title> PHP Script for Bins Table </title>
<link rel="stylesheet" type="text/css" href="../css/HomePage.css">
<link rel="stylesheet" type="text/css" href="../css/AdminPage.css">
<link rel="stylesheet" type="text/css" href="../css/Modal.css">
   </head>
<body>
<?php
			     // Create connection
$connection = include '../php/ConnectDB.php';

// Get the itemID entered by the user in the ID box
$RFID = $_POST['RFID'];
$RFID = stripcslashes($RFID);
$RFIDU = htmlspecialchars($RFID);
//query to select info from Items
$query = "DELETE FROM Bins WHERE RFID_Tag = '$RFIDU'";

//Variable to store query result
$Qresult = mysqli_query($db, $query);

if(!$Qresult)//if statement for checking query
  {
    print "Error - The query was not successful.";
    $error = mysql_error();//sql error
    print "<p>" . $error . "</p>";
    exit;
  }
 else{print "ITEM DELETED";}
?>
</body>
</html>
