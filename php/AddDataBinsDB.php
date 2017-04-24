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
<!--ADD Bins Info Form  -->
<html lang = "en">
   <head>
<title> PHP Script for Bins Table </title>
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

// Get the itemID entered by the user in the ID box
$t1ID = $_POST['RFID'];
$t1ID = stripcslashes($t1ID);
$t1IDU = htmlspecialchars($t1ID);

$t2ID = $_POST['Account_Num'];
$t2ID = stripcslashes($t2ID);
$t2IDU = htmlspecialchars($t2ID);

$t3ID = $_POST['Resident_ID'];
$t3ID = stripcslashes($t3ID);
$t3IDU = htmlspecialchars($t3ID);

$t4ID = $_POST['Bin_Type'];
$t4ID = stripcslashes($t4ID);
$t4IDU = htmlspecialchars($t4ID);

$query = "INSERT INTO Bins(RFID_Tag,Account_Num,Resident_ID,Bin_Type) VALUES('$t1IDU','$t2IDU','$t3IDU','$t4IDU')";

if(mysqli_query($db, $query)){
  echo "New Record has been added.";
 } else{
  echo "ERROR: Could was not able to execute record addition." . mysqli_error($link);
 }

// close connection
mysqli_close($link);
?>
</body>
</html>
