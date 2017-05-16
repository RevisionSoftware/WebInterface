<?php
session_start();
//if not logged in, redirect to LoginPage
if(!isset($_SESSION['username'])){
   header("Location: ../php/LoginPage.php");
}

if($_SESSION["teamtype"] != "Admin"){
header("Location: ../php/HomePage.php");
}
?>
<!DOCTYPE html>
<!--ADD Bins Info Form  -->
<html lang = "en">
   <head>
<title> PHP Script for Truck Table </title>
<link rel="stylesheet" type="text/css" href="../Style/view.css">
   </head>
<body>
  <?php
  			     // Create connection
  $connection = include '../php/ConnectDB.php';

// Get the itemID entered by the user in the ID box

$t2ID = $_POST['Route_Num'];
$t2ID = stripcslashes($t2ID);
$t2IDU = htmlspecialchars($t2ID);

$t3ID = $_POST['Employee_Number'];
$t3ID = stripcslashes($t3ID);
$t3IDU = htmlspecialchars($t3ID);

$t4ID = $_POST['Truck_Type'];
$t4ID = stripcslashes($t4ID);
$t4IDU = htmlspecialchars($t4ID);

$t5ID = $_POST['License_Plate'];
$t5ID = stripcslashes($t5ID);
$t5IDU = htmlspecialchars($t5ID);

$query = "INSERT INTO Truck(Route_Num,Employee_Number,Truck_Type,License_Plate)
VALUES($t2IDU','$t3IDU','$t4IDU','$t5IDU')";

if(mysqli_query($connection, $query)){
  echo "New Record has been added.";
 } else{
  echo "ERROR: Could was not able to execute record addition." . mysqli_error($connection);
 }

// close connection
mysqli_close($connection);
?>
</body>
</html>
