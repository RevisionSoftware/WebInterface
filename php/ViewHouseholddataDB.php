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
<title> PHP Script for Trucks Table </title>
<link rel="stylesheet" type="text/css" href="../css/HomePage.css">
<link rel="stylesheet" type="text/css" href="../css/AdminPage.css">
   </head>
<body>
<?php
// Create connection
$connection = include '../php/ConnectDB.php';

$HID = $_POST['Account_Num'];
$HID = stripcslashes($HID);
$HIDU = htmlspecialchars($HID);
//View Household

//$BIN = $_GET['1'];
$WEIGHT = $_POST['WASTE'];
$PERCENTAGE = $POST['PERCENTAGE'];
$ALL = $POST['ALL'];

//Waste Type
$Twaste = $POST['Twaste'];
$Rwaste = $POST['Rwaste'];
$Gwaste = $POST['Gwaste'];
$Awaste = $POST['Awaste'];

if($Account_Num != "")
{
  if($ALL !="ALL")
  {
    if($WEIGHT ="WEIGHT")
    {
        if($Twaste ="Twaste" && $Rwaste ="Rwaste" )
        {
        $query = "SELECT Weight AS Trash_Weight
                    FROM Bins WHERE 'Account_Num' = $HIDU
                    AND Bin_Type = 'Trash';";
        $query .= "SELECT Weight AS Recycle_Weight
                   FROM Bins WHERE 'Account_Num' = $HIDU
                    AND Bin_Type = 'Recycle';"

        }
      if($Rwaste ="Rwaste" && $Gwaste ="Gwaste")
        {
        $query = "SELECT Weight AS Recycle_Weight
                    FROM Bins WHERE 'Account_Num' = $HIDU
                    AND Bin_Type = 'Recycle';";
        $query .= "SELECT Weight AS Trash_Weight
                    FROM Bins WHERE 'Account_Num' = $HIDU
                    AND Bin_Type = 'Green Waste';"
        }
        if($Gwaste ="Gwaste" && $Twaste ="Twaste" )
        {
        $query = "SELECT Weight AS Trash_Weight
                    FROM Bins WHERE 'Account_Num' = $HIDU
                    AND Bin_Type = 'Green Waste';";
        $query .= "SELECT Weight AS Trash_Weight
                    FROM Bins WHERE 'Account_Num' = $HIDU
                    AND Bin_Type = 'Trash';"
        }
        if($Twaste ="Twaste")
        {
        $query = "SELECT Weight AS Trash_Weight
                    FROM Bins WHERE 'Account_Num' = $HIDU
                    AND Bin_Type = 'Trash';";
        }
      if($Rwaste ="Rwaste")
        {
        $query = "SELECT Weight AS Recycle_Weight
                    FROM Bins WHERE 'Account_Num' = $HIDU
                    AND Bin_Type = 'Recycle';";
        }
        if($Gwaste ="Gwaste")
        {
        $query = "SELECT Weight AS Trash_Weight
                    FROM Bins WHERE 'Account_Num' = $HIDU
                    AND Bin_Type = 'Green Waste';";
        }
    }
    if($All ="Awaste")
    {
      $query = "SELECT Bin_Weight AS Trash_Weight
                  FROM Bins WHERE 'Account_Num' = $HIDU
                  AND Bin_Type = 'Trash';";
      $query .= "SELECT Bin_Weight AS Recycle_Weight
                  FROM Bins WHERE 'Account_Num' = $HIDU
                  AND Bin_Type = 'Recycle'";
      $query .= "SELECT Bin_Weight AS Trash_Weight
                  FROM Bins WHERE 'Account_Num' = $HIDU
                  AND Bin_Type = 'Green Waste'";
    }
    //Start of percentage check
    if($PERCENTAGE!="Pwaste")
    {
        if($Twaste ="T" && $Rwaste ="Rwaste")
        {
          $query = "SELECT (Bin_Weight / (SELECT Bin_Weight FROM Bins WHERE $t1IDU = 'Account_Num' AND )) * 100 AS 'TPercentage'
                      FROM Bins WHERE 'Account_Num' = $HIDU
                      AND Bin_Type = 'Trash';";
          $query .= "SELECT (Bin_Weight / (SELECT Bin_Weight FROM Bins WHERE $t1IDU = 'Account_Num' AND )) * 100 AS 'RPercentage'
                      FROM Bins WHERE 'Account_Num' = $HIDU
                      AND Bin_Type = 'Recycle'";
        }
        if($Rwaste ="Rwaste" && $Gwaste ="Gwaste")
        {
          $query = "SELECT (Bin_Weight / (SELECT Bin_Weight FROM Bins WHERE $t1IDU = 'Account_Num' AND )) * 100 AS 'RPercentage'
                      FROM Bins WHERE 'Account_Num' = $HIDU
                      AND Bin_Type = 'Recycle';";
          $query .= "SELECT (Bin_Weight / (SELECT Bin_Weight FROM Bins WHERE $t1IDU = 'Account_Num' AND )) * 100 AS 'GPercentage'
                      FROM Bins WHERE 'Account_Num' = $HIDU
                      AND Bin_Type = 'Green'";
        }
        if($Gwaste ="Gwaste" && $Twaste ="T")
        {
          $query = "SELECT (Bin_Weight / (SELECT Bin_Weight FROM Bins WHERE $t1IDU = 'Account_Num' AND )) * 100 AS 'GPercentage'
                      FROM Bins WHERE 'Account_Num' = $HIDU
                      AND Bin_Type = 'Green';";
          $query .= "SELECT (Bin_Weight / (SELECT Bin_Weight FROM Bins WHERE $t1IDU = 'Account_Num' AND )) * 100 AS 'TPercentage'
                      FROM Bins WHERE 'Account_Num' = $HIDU
                      AND Bin_Type = 'Trash'";
        }
        if($Twaste ="T")
        {
          $query = "SELECT (Bin_Weight / (SELECT Bin_Weight FROM Bins WHERE $t1IDU = 'Account_Num' AND )) * 100 AS 'TPercentage'
                      FROM Bins WHERE 'Account_Num' = $HIDU
                      AND Bin_Type = 'Trash';";
        }
        if($Rwaste ="Rwaste")
        {
          $query = "SELECT (Bin_Weight / (SELECT Bin_Weight FROM Bins WHERE $t1IDU = 'Account_Num' AND )) * 100 AS 'RPercentage'
                      FROM Bins WHERE 'Account_Num' = $HIDU
                      AND Bin_Type = 'Recycle';";
        }
        if($Gwaste ="Gwaste")
        {
          $query = "SELECT (Bin_Weight / (SELECT Bin_Weight FROM Bins WHERE $t1IDU = 'Account_Num' AND )) * 100 AS 'GPercentage'
                      FROM Bins WHERE 'Account_Num' = $HIDU
                      AND Bin_Type = 'Green';";
        }
    }
if($Awaste !="Awaste")
  {
  $query = "SELECT Bin_Weight AS Trash_Weight
            FROM Bins WHERE 'Account_Num' = $HIDU
            AND Bin_Type = 'Trash';";
  $query .= "SELECT Bin_Weight AS Recycle_Weight
            FROM Bins WHERE 'Account_Num' = $HIDU
            AND Bin_Type = 'Recycle';"
  $query .= "SELECT Bin_Weight AS Trash_Weight
            FROM Bins WHERE 'Account_Num' = $HIDU
            AND Bin_Type = 'Green Waste';"
  }
}
    /* execute multi query */
    if (mysqli_multi_query($connection, $query)) {
        do {
            /* store first result set */
            if ($result = mysqli_store_result($connection)) {
                while ($row = mysqli_fetch_row($result)) {
                    printf("%s\n", $row[0]);
                }
                mysqli_free_result($result);
            }
            /* print divider */
            if (mysqli_more_results($connection)) {
                printf("-----------------\n");
            }
        } while (mysqli_next_result($connection));
    }
    else{
      {
        print "Error - The query was not successful.";
        $error = mysql_error();//sql error
        print "<p>" . $error . "</p>";
        exit;
      }
    /* close connection */
    mysqli_close($connection);
    ?>
</body>
</html>
