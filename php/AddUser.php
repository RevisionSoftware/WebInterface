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
?>
<!DOCTYPE html>
<!-- Created by: Revision Software -->
<html lang="en">

<head>
  <meta charset="UTF-8">
    <title>Add User</title>

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
  <h2>Add Member<h2>
<br>
<form id="CreateUser" method="POST">
  <label>Username: <input type="text" name="Username" tile="Username" required></label><br>
  <label>First Name: <input type="text" name="FName" tile="First Name" required></label><br>
  <label>Last Name: <input type="text" name="LName" tile="Last Name" required></label><br>
  <label>Password: <input type="password" name="Password1" required></label><br>
  <label>Re-Enter Password: <input type="password" name="Password2" required></label><br>
  <select name="TeamType">
      <option value="Standard" name="Standard">Standard</option>
      <option value="Admin" name="Admin">Admin</option>
    </select><br>
   <input type="submit" name="submit" value="Submit" class="submit"</input>
   <?php
    if(isset($_POST['submit'])){
      CreateUser();
    }
    ?>
   <br>
   <br>
</form>

</div>
<?php
//PHP THAT WILL CHECK ALL CONSTRAINTS ON CREATE USER
$Username = $Fname = $Lname = $Password1 = $Password2 = "";

function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//Clears whitespaces in form
function CreateUser(){
  $errorString = "";
  //Checking Username String
  if(empty($_POST["Username"])){
  $errorString = $errorString . "Username is required.<br>";
  }
  else
  {
    $Username = test_input($_POST["Username"]);
    if(!preg_match("/^[a-zA-Z0-9]+$/", $Username)){
      $errorString = $errorString . "Invalid Username format: Only use letters and numbers. <br>";
    }
    if(strlen($Username) < 4){
      $errorString = $errorString . "Invalid Username format: Must be greater than 4 characters. <br>";
    }
  }
  if(empty($_POST["FName"])){
  $errorString = $errorString . "First Name is required.<br>";
  }
  else
  {
    $FName = test_input($_POST["FName"]);
    if(!preg_match("/^[a-zA-Z'-]+$/", $FName)){
      $errorString = $errorString . "Invalid Name format: Only use letters. <br>";
    }
  }
  if(empty($_POST["LName"])){
  $errorString = $errorString . "Last Name is required.<br>";
  }
  else
  {
    $LName = test_input($_POST["LName"]);
    if(!preg_match("/^[a-zA-Z'-]+$/", $LName)){
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
      // Creates the User
      $CreateUserQuery = "INSERT INTO User (Username, UserPassword, First_Name, Last_Name)
      VALUES ('" . $Username . "', '" . password_hash($Password1, PASSWORD_DEFAULT) . "', '" . $FName . "', '" . $LName . "')";

    if (mysqli_query($connection, $CreateUserQuery)){
        echo "<p style=\"text-align:center; color:Black; width:100%; font-size:12px;\">New user: <b>$Username</b> created Succesfully!<br></p>";
        $TeamUserID = mysqli_insert_id($connection);
        $AddTeam = "INSERT INTO Team (User_ID, Team_Type) VALUES ($TeamUserID, '" . $_POST['TeamType'] . "')";
        mysqli_query($connection, $AddTeam);

      }
      else {
        echo "Error: " . $CreateUserQuery . "<br>" . mysqli_error($connection);
      }
}
}


?>
</main>
</body>
</html>
