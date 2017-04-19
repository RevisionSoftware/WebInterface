<?php
session_start();
//if not logged in, redirect to LoginPage
/* if(!isset($_SESSION['username'])){
//   header("Location: ../php/LoginPage.php");
else{ */
//if not admin, do not allow on this page
if($_SESSION["teamtype"] != "Admin"){
header("Location: ../php/HomePage.php");
}
//}
//}

$connection = include '../php/ConnectDB.php';
?>
<!DOCTYPE html>
<!-- Created by: Revision Software -->
<html lang="en">

<head>
  <meta charset="UTF-8">
    <title>Admin Page</title>

     <link rel="stylesheet" type="text/css" href="../css/HomePage.css">
     <link rel="stylesheet" type="text/css" href="../css/AdminPage.css">

</head>

<body>
  <!-- START HEADER: MUST BE ON ALL PAGES -->
<header>
<div>
  <ul>
      <li><a href="../php/HomePage.php">HOME</a></li>
      <li><a href="../php/DownloadPage.php">DOWNLOAD</a></li>
      <li><a href="../php/Householdlookup.php">HOUSEHOLD LOOKUP</a></li>
      <li><a href="../php/Viewdata.php">VIEW DATA</a></li>
  </ul>
  <ul class="logout">
    <?php if($_SESSION["teamtype"] == "Admin"){ echo '<li><a href="../php/AdminPage.php">ADMINISTRATION</a></li>'; } ?>
    <li><a href="../php/Logout.php">LOGOUT</a></li>
</ul>
</div>
</header>

<main>
    <h1>Administration Page</h1>
<div class="Outer-Form">
  <h2>Team Members<h2>
<?php
$sql = "SELECT Username AS User, First_Name AS 'First Name', Last_Name AS 'Last Name', Team_Type AS Type FROM User, Team WHERE (User.User_ID=Team.User_ID) ORDER BY Last_Name ASC";
$result = mysqli_query($connection, $sql);

if($result->num_rows > 0) {
echo("<table>");
$first_row = true;
while ($row = mysqli_fetch_assoc($result)) {
  $rownum = 0;
    if ($first_row) {
        $first_row = false;
        // Output header row from keys.
        echo '<tr>';
        foreach($row as $key => $field) {
            echo '<th>' . htmlspecialchars($key) . '</th>';
        }
        echo '<th> Modify </th>';
        echo '</tr>';
    }
    echo '<tr>';
    foreach($row as $key => $field) {
        echo '<td>' . htmlspecialchars($field) . '</td>';
        $rownum++;
    }
    echo '<td> <input type="image" src="../image/EditIcon.png" name="Edit" value="Modify" class="image" id="$rownum"> </td>';
    echo '</tr>';
}
echo("</table>");
}
?>
<br>
<input type="submit" onclick="location.href='../php/AddUser.php'" value="Add User">
</div>

</main>
</body>
</html>
