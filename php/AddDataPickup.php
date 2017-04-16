<!DOCTYPE html>
<!-- Created by: Revision Software -->
<html lang="en">

<head>
  <meta charset="UTF-8">
    <title>ADD DATA PICKUP Page</title>
     <link rel="stylesheet" type="text/css" href="../css/HomePage.css">
     <link rel="stylesheet" type="text/css" href="../css/DownloadPage.css">
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
    <li><a href="../php/AdminPage.php">ADMINISTRATION</a></li>
    <li><a href="../php/LoginPage.php">LOGOUT</a></li>
</ul>
</div>
  </header>

<main>
  <div class="center">
  <!-- Main Page HTML goes here -->
  <h1> ADD DATA PICKUP PAGE </h1>
  <h1> ADD Data Components here </h1>
  <form>
  <fieldset><legend>Product Information</legend>
  <label for= "Address">Address:</label>
  <input type="text" name="Address" id="Address" size="20" maxlength= "30" placeholder="Enter Address" autofocus required> <br>
  <br>
  <label for="City">City: </label>
  <input type="text" name="City" id="City" size="15" maxlength="10" placeholder="Enter City" required> <br>
  <br>
  <label for="State">State:</label>
  <input type="text" name="State" id="State" size="15" maxlength="15" placeholder="Enter State" required> <br>
  <br>
  <label for="Zip">Zip:</label>
  <input type="text" name="Zip" id="Zip" size="15" maxlength="15" placeholder="Enter Zip" required> <br>
  <br>
  <label for="Weight">Weight:</label>
  <input type="text" name="Weight" id="Weight" size="15" maxlength="15" placeholder="Enter Weight" required> <br>
  <br>
  <label for="Stop_Time">Stop_Time:</label>
  <input type="text" name="Stop_Time" id="Stop_Time" size="15" maxlength="15" placeholder="Enter Stop_Time" required> <br>
  <br>
  <label for="Start_Time">Start_Time:</label>
  <input type="text" name="Start_Time" id="Start_Time" size="15" maxlength="15" placeholder="Enter Start_Time" required> <br>
  <br>
  <label for="Date_Time">Date_Time:</label>
  <input type="text" name="Date_Time" id="Date_Time" size="15" maxlength="15" placeholder="Enter Date_Time" required> <br>
  <br>

  <label for="Pickup_Type">Pickup_Type:</label>
  <input type="text" name="Pickup_Type" id="Pickup_Type" size="15" maxlength="15" placeholder="Enter Pickup_Type" required> <br>
  <br>
  <label for="Longitude">Longitude:</label>
  <input type="text" name="Longitude" id="Longitude" size="15" maxlength="15" placeholder="Enter Longitude" required> <br>
  <br>
  <label for="Latitude">Latitude:</label>
  <input type="text" name="Latitude" id="Latitude" size="15" maxlength="15" placeholder="Enter Latitude" required> <br>
  <br>
  <label for="N_Code">N_Code:</label>
  <input type="text" name="N_Code" id="N_Code" size="15" maxlength="15" placeholder="Enter N_Code" required> <br>
  <br>
  <label for="Route_Num">Route_Num:</label>
  <input type="text" name="Route_Num" id="Route_Num" size="15" maxlength="15" placeholder="Enter Route_Num" required> <br>
  <br>
  <label for="Account_Num">Account_Num:</label>
  <input type="text" name="Account_Num" id="Account_Num" size="15" maxlength="15" placeholder="Enter Account_Num" required> <br>
  <br>
  <label for="Resident_ID">Resident_ID:</label>
  <input type="text" name="Resident_ID" id="Resident_ID" size="15" maxlength="15" placeholder="Enter Resident_ID" required> <br>
  <br>
  <label for="RFID_Tag">RFID_Tag:</label>
  <input type="text" name="RFID_Tag" id="RFID_Tag" size="15" maxlength="15" placeholder="Enter RFID_Tag" required> <br>
  <br>
  <INPUT type="submit" id="submit" value="Submit"/>
  <INPUT type="submit" id="submit" value="Clear"/>
  </fieldset>
  <br>
  </form>
</div>
</main>
</body>

</html>
