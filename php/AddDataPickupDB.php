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
<title> PHP Script for Bins Table </title>
<link rel="stylesheet" type="text/css" href="../Style/view.css">
   </head>
<body>
  <?php
  			     // Create connection
  $connection = include '../php/ConnectDB.php';

// Get the itemID entered by the user in the ID box

$t2ID = $_POST['Address'];
$t2ID = stripcslashes($t2ID);
$t2IDU = htmlspecialchars($t2ID);

$t3ID = $_POST['City'];
$t3ID = stripcslashes($t3ID);
$t3IDU = htmlspecialchars($t3ID);

$t4ID = $_POST['State'];
$t4ID = stripcslashes($t4ID);
$t4IDU = htmlspecialchars($t4ID);

$t5ID = $_POST['Zip'];
$t5ID = stripcslashes($t5ID);
$t5IDU = htmlspecialchars($t5ID);

$t6ID = $_POST['Weight'];
$t6ID = stripcslashes($t6ID);
$t6IDU = htmlspecialchars($t6ID);

$t7ID = $_POST['Start_Time'];
$t7ID = stripcslashes($t7ID);
$t7IDU = htmlspecialchars($t7ID);

$t8ID = $_POST['Stop_Time'];
$t8ID = stripcslashes($t8ID);
$t8IDU = htmlspecialchars($t8ID);

$t9ID = $_POST['Date_Time'];
$t9ID = stripcslashes($t9ID);
$t9IDU = htmlspecialchars($t9ID);

$t10ID = $_POST['Pickup_Type'];
$t10ID = stripcslashes($t10ID);
$t10IDU = htmlspecialchars($t10ID);

$t11ID = $_POST['Longitude'];
$t11ID = stripcslashes($t11ID);
$t11IDU = htmlspecialchars($t11ID);

$t12ID = $_POST['Latitude'];
$t12ID = stripcslashes($t12ID);
$t12IDU = htmlspecialchars($t12ID);

$t13ID = $_POST['N_Code'];
$t13ID = stripcslashes($t13ID);
$t13IDU = htmlspecialchars($t13ID);

$t14ID = $_POST['Route_Num'];
$t14ID = stripcslashes($t14ID);
$t14IDU = htmlspecialchars($t14ID);

$t15ID = $_POST['Account_Num'];
$t15ID = stripcslashes($t15ID);
$t15IDU = htmlspecialchars($t15ID);

$t16ID = $_POST['Resident_ID'];
$t16ID = stripcslashes($t16ID);
$t16IDU = htmlspecialchars($t16ID);

$t17ID = $_POST['RFID_Tag'];
$t17ID = stripcslashes($t17ID);
$t17IDU = htmlspecialchars($t17ID);

$query = "INSERT INTO Pickup(Address,City,State,Zip,Weight,Start_Time,Stop_Time,Date_Time,Pickup_Type,Longitude,Latitude,N_Code,Route_Num,Account_Num,Resident_ID,RFID_Tag)
VALUES($t2IDU','$t3IDU','$t4IDU','$t5IDU','$t6IDU','$t7IDU','$t8IDU','$t9IDU','$t10IDU','$t11IDU','$t12IDU','$t13IDU','$t14IDU','$t15IDU','$t16IDU','$t17IDU')";

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
