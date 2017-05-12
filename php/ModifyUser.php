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
    <title>Modify User Page</title>

     <link rel="stylesheet" type="text/css" href="../css/HomePage.css">
     <link rel="stylesheet" type="text/css" href="../css/AdminPage.css">

</head>

<body>
  <!-- START HEADER: MUST BE ON ALL PAGES -->
<header>
<div>
  <ul>
      <li><a href="../php/HomePage.php">HOME</a></li>
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
<h1> Modify User </h1>
<div class="Outer-Form">
<?php
$rowid = $_GET['id'];
$sql = "SELECT Username, First_Name, Last_Name, Team_Type FROM User, Team WHERE (User.User_ID=$rowid AND (User.User_ID=Team.User_ID))";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);

$Username = $row['Username'];
$FName = $row['First_Name'];
$LName = $row['Last_Name'];
$Type = $row['Team_Type'];
$_SESSION['EditUser'] = $Username;

?>
<form method="POST">
  <input type="submit" name="delete" value="Delete User" class="delete"><br><br>
</form>
<form id="CreateUser" method="POST">
  <label>Username: <input type="text" name="NewUsername" tile="Username" <?php echo 'value="'.$Username.'"' ?> required></label><br>
  <label>First Name: <input type="text" name="NewFName" tile="First Name" <?php echo 'value="'.$FName.'"' ?> required></label><br>
  <label>Last Name: <input type="text" name="NewLName" tile="Last Name" <?php echo 'value="'.$LName.'"' ?> required></label><br>
  <label>New Password: <input type="password" name="Password1" required></label><br>
  <label>Re-Enter Password: <input type="password" name="Password2" required></label><br>
  <select name="NewTeamType">
      <option value="Standard" name="Standard" <?php if ($Type == 'Standard') echo ' selected="selected"'; ?>>Standard</option>
      <option value="Admin" name="Admin" <?php if ($Type == 'Admin') echo ' selected="selected"'; ?>>Admin</option>
    </select><br><br>
   <input class="submit" type="submit" name="submit" value="Update User"</input>
   <br>
   <br>
   <?php
    if(isset($_POST['submit'])){
      ModifyUser();
    }
    if(isset($_POST['delete'])){
       DeleteUser();
     }
    ?>

</form>
</div>
<?php
function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function ModifyUser(){
  $errorString = "";
  //Checking Username String
  if(empty($_POST["NewUsername"])){
  $errorString = $errorString . "Username is required.<br>";
  }
  else
  {
    $NewUsername = test_input($_POST["NewUsername"]);
    if(!preg_match("/^[a-zA-Z0-9]+$/", $NewUsername)){
      $errorString = $errorString . "Invalid Username format: Only use letters and numbers. <br>";
    }
    if(strlen($NewUsername) < 4){
      $errorString = $errorString . "Invalid Username format: Must be greater than 4 characters. <br>";
    }
  }
  if(empty($_POST["NewFName"])){
  $errorString = $errorString . "First Name is required.<br>";
  }
  else
  {
    $NewFName = test_input($_POST["NewFName"]);
    if(!preg_match("/^[a-zA-Z'-]+$/", $NewFName)){
      $errorString = $errorString . "Invalid Name format: Only use letters. <br>";
    }
  }
  if(empty($_POST["NewLName"])){
  $errorString = $errorString . "Last Name is required.<br>";
  }
  else
  {
    $NewLName = test_input($_POST["NewLName"]);
    if(!preg_match("/^[a-zA-Z'-]+$/", $NewLName)){
      $errorString = $errorString . "Invalid Name format: Only use letters. <br>";
    }
  }
  //Checking passwords
  if(empty($_POST["Password1"])){
    $errorString = $errorString . "Password is required.<br>";
    }
    else
    {
      $Password1 = test_input($_POST["Password1"]);
    }
    if(empty($_POST["Password2"])){
      $errorString = $errorString . "Verify your password<br>";
    }
    else
    {
      $Password2 = test_input($_POST["Password2"]);
    }
    //Checking if passwords match
    if(strcmp($Password1,$Password2) != 0){
      $errorString = $errorString . "Passwords do not match<br>";
    }
    //Hash password if they match
    if(strlen($errorString) > 0){
    echo "<p style=\"text-align:center; color:red; width:100%; font-size:12px;\">" . $errorString . "</p>";
}

if(strlen($errorString) == 0){
  $connection = include '../php/ConnectDB.php';
 $sqlUpdate = "UPDATE User SET Username='".$NewUsername."', UserPassword='".password_hash($Password1, PASSWORD_DEFAULT)."', First_Name='".$NewFName."', Last_Name='".$NewLName."' WHERE Username='".$_SESSION['EditUser']."'";
  if (mysqli_query($connection, $sqlUpdate)){
    $GetId = "SELECT User_ID FROM User WHERE Username='".$_SESSION['EditUser']."'";
    $result = mysqli_query($connection, $GetId);
    $row = mysqli_fetch_assoc($result);
    $Userid = $row['User_ID'];
    $EditTeam = "UPDATE Team SET Team_Type='".$_POST['NewTeamType']."' WHERE Team.User_ID=$Userid";
    mysqli_query($connection, $EditTeam);
   echo "<p style=\"text-align:center; color:black; width:100%; font-size:12px;\"> '".$_SESSION['EditUser']."' updated. <br></p>";
    }
  }
}
function DeleteUser(){
  $connection = include '../php/ConnectDB.php';
  $GetId = "SELECT User_ID FROM User WHERE Username='".$_SESSION['EditUser']."'";
  $result = mysqli_query($connection, $GetId);
  $row = mysqli_fetch_assoc($result);
  $Userid = $row['User_ID'];

  $deleteTeam = "DELETE FROM Team WHERE Team.User_ID=$Userid";
  if (mysqli_query($connection, $deleteTeam)){
    $sqlDelete = "DELETE FROM User WHERE Username='".$_SESSION['EditUser']."'";
    mysqli_query($connection, $sqlDelete);

    echo "<p style=\"text-align:center; color:black; width:100%; font-size:12px;\"> '".$_SESSION['EditUser']."' deleted. <br></p>";
  }
}
?>
</main>
</body>
</html>
