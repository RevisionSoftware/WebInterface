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
<br>
<form id="CreateUser" method="POST">
  <label>Username: <input type="text" name="Username" tile="Username"></label><br>
  <label>First Name: <input type="text" name="FName" tile="First Name"></label><br>
  <label>Last Name: <input type="text" name="LName" tile="Last Name"></label><br>
  <label>Password: <input type="password" name="Password1"></label><br>
  <label>Re-Enter Password: <input type="password" name="Password2"></label><br>
  <select name="TeamType">
      <option value="Standard" name="Standard">Standard</option>
      <option value="Admin" name="Admin">Admin</option>
    </select><br>
   <input type="submit" name="submit" value="Submit"</input>
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
      // Creates the User
      $connection = include '../php/ConnectDB.php';
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
