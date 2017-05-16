<!DOCTYPE html>
<!-- Created by: Revision Software -->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="../css/LoginPage.css">
</head>

<body>
  <div class="login">
    <div class="form">
      <form id="login" method="POST">
        <input type="text" name="Username" placeholder="username" required=""/>
        <input type="password" name="Password" placeholder="password" required=""/>
        <input type="submit" name="submit" value="LOGIN"</input>
        <?php
        if(isset($_POST['submit'])){
          LoginUser();
        }
          ?>
      </form>
    </div>
  </div>

<?php

$Username = $Password = "";
function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function LoginUser(){
  $errorString = "";
  //Checking entry strings
  if(empty($_POST["Username"])){
  $errorString = $errorString . "Username is required.<br>";
  }
  else
  {
    $Username = test_input($_POST["Username"]);
  }
  if(empty($_POST["Password"])){
  $errorString = $errorString . "Password is required.<br>";
  }
  else{
    $Password = test_input($_POST["Password"]);
  }
  if(strlen($errorString) > 0){
  echo "<p style=\"text-align:center; color:red; width:100%; font-size:12px;\">" . $errorString . "</p>";
  }
  $connection = include '../php/ConnectDB.php';
  $GetHashDB = "SELECT UserPassword FROM User WHERE (Username = '$Username')";
  $result = mysqli_query($connection, $GetHashDB);

  $num_rows = mysqli_num_rows($result);

  if($num_rows ==1)
  {
    $row = mysqli_fetch_assoc($result);
    $hash = $row['UserPassword'];
    //password matches, sending to homepage and setting session variables
    if(password_verify($Password, $hash))
   {
     session_start();

    //query to get team type
    $GetType = "SELECT Team_Type FROM User,Team WHERE ((Username = '$Username') AND (User.User_ID=Team.User_ID))";
    $result_type = mysqli_query($connection, $GetType);
    $typerow = mysqli_fetch_assoc($result_type);
    $TeamType = $typerow['Team_Type'];
    //setting team team type ... admin or standard
    $_SESSION["teamtype"] = $TeamType;
    if ($TeamType == "") {
      echo "<p style=\"text-align:center; color:red; width:100%; font-size:12px;\"> You do not have access to the team interface. </p>";
      exit();
    }
    //setting username session
    $_SESSION["username"] = $Username;
    //sending to homepage on successful login
    header("Location: ../php/HomePage.php");
    exit();
  }
   }
   if($num_rows ==0)
  {
    echo "<p style=\"text-align:center; color:red; width:100%; font-size:12px;\">Username does not exist.</p>";
  }
  else
  {
    echo "<p style=\"text-align:center; color:red; width:100%; font-size:12px;\">Invalid password.</p>";
  }

}
?>
</body>
</html>
