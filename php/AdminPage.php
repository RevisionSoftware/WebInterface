<!DOCTYPE html>
<!-- Created by: Revision Software -->
<html lang="en">

<head>
  <meta charset="UTF-8">
    <title>Admin Page</title>

     <link rel="stylesheet" type="text/css" href="../css/HomePage.css">
     <link rel="stylesheet" type="text/css" href="../css/AdminPage.css">
     <link rel="stylesheet" type="text/css" href="../css/Modal.css">

</head>

<body>
  <!-- START HEADER: MUST BE ON ALL PAGES -->
<header>
<div>
  <ul>
      <li><a href="../html/HomePage.html">HOME</a></li>
      <li><a href="../html/DownloadPage.html">DOWNLOAD</a></li>
      <li><a href="../html/Householdlookup.html">HOUSEHOLD LOOKUP</a></li>
      <li><a href="../html/Viewdata.html">VIEW DATA</a></li>
  </ul>
  <ul class="logout">
    <li><a href="../php/AdminPage.php">ADMINISTRATION</a></li>
    <li><a href="../html/LoginPage.html">LOGOUT</a></li>
</ul>
</div>
</header>

<main>
    <h1>Administration Page</h1>
<div class="Outer-Form">
  <h2>Team Members<h2>
<?php
$connection = include '../php/ConnectDB.php';
$sql = "SELECT Username AS User, First_Name AS 'First Name', Last_Name AS 'Last Name', Team_Type AS Type FROM User, Team WHERE (User.User_ID=Team.User_ID) ORDER BY Last_Name ASC";
$result = mysqli_query($connection, $sql);

if($result->num_rows > 0) {
echo("<table>");
$first_row = true;
while ($row = mysqli_fetch_assoc($result)) {
    if ($first_row) {
        $first_row = false;
        // Output header row from keys.
        echo '<tr>';
        foreach($row as $key => $field) {
            echo '<th>' . htmlspecialchars($key) . '</th>';
        }
        echo '</tr>';
    }
    echo '<tr>';
    foreach($row as $key => $field) {
        echo '<td>' . htmlspecialchars($field) . '</td>';
    }
    echo '</tr>';
}
echo("</table>");
}
?>
<br>
<input type="button" onclick="location.href='../php/AddUser.php'" value="Add User">


</div>

</main>
</body>
</html>
