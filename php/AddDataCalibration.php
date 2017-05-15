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
<!--ADD Calibration Form  -->
<html lang = "en">
   <head>
<title> PHP Script for Calibration Table </title>
<link rel="stylesheet" type="text/css" href="../Style/view.css">
   </head>
<body>
<?php
				   //Create a basic connection
$connection = include '../php/ConnectDB.php';

if (!$connection) // Check connection if statement
  {
    print "*****CONNECTION TO DATABASE FAILED***** ";exit;
  }
echo "*****CONNECTION TO DATABASE SUCCESSFUL*****";


// Get the itemID entered by the user in the ID box
$t1ID = $_POST['CID'];
$t1ID = stripcslashes($t1ID);
$t1IDU = htmlspecialchars($t1ID);

$t2ID = $_POST['RFID'];
$t2ID = stripcslashes($t2ID);
$t2IDU = htmlspecialchars($t2ID);

$t3ID = $_POST['TruckID'];
$t3ID = stripcslashes($t3ID);
$t3IDU = htmlspecialchars($t3ID);

$t4ID = $_POST['Coefficient'];
$t4ID = stripcslashes($t4ID);
$t4IDU = htmlspecialchars($t4ID);

$t5ID = $_POST['Weight'];
$t5ID = stripcslashes($t5ID);
$t5IDU = htmlspecialchars($t5ID);

$t6ID = $_POST['Start'];
$t6ID = stripcslashes($t6ID);
$t6IDU = htmlspecialchars($t6ID);

$t7ID = $_POST['Stop'];
$t7ID = stripcslashes($t7ID);
$t7IDU = htmlspecialchars($t7ID);

$t8ID = $_POST['Date'];
$t8ID = stripcslashes($t8ID);
$t8IDU = htmlspecialchars($t8ID);


$query = "INSERT INTO Calibration(Calibration_ID,RFID_Tag,Truck_ID,Coefficient,Weight,Start_Time,Stop_Time,Date_Time) VALUES('$t1IDU','$t2IDU','$t3IDU','$t4IDU','$t5IDU','$t6IDU','$t7IDU','$t8IDU')";

if(mysqli_query($connection, $query)){
  echo "New Record has been added.";
 } else{
  echo "ERROR: Could was not able to execute record addition." . mysqli_error($link);
 }

// close connection
mysqli_close($link);
?>
</body>
</html>
