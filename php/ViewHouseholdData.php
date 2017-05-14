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
<!-- Created by: Revision Software -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="../css/HomePage.css">
    <link rel="stylesheet" type="text/css" href="../css/DataForm.css">
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
    <!-- END HEADER: MUST BE ON ALL PAGES -->

    <main>
        <div class="centered">
            <!-- Main Page HTML goes here -->
            <h1> VIEW HOUSEHOLD DATA </h1>

            <!-- Route Type Checkboxes -->

            <!-- Account Num  -->
            <div class="SearchType">
                <h2> <u>Search by: </u></h2>
                <form id = "ID" action = "ViewHouseholddataDB.php" method = "post">
                    <label> Account Number: </label><input type="text" name="Account_Num" id = "Account_Num" value=""><br>

            </div>
            <!-- Route Type Checkboxes -->
            <div class="viewType">
                <h3> <u>VIEW HOUSEHOLD: </u></h3>
                    <ul>
                        <!--<li><label><input type="checkbox" name="BIN" value="1" /> BIN IN/OUT </label></li>-->
                        <li><label><input type="checkbox" name="WEIGHT" value="WEIGHT" /> WEIGHT </label></li>
                        <li><label><input type="checkbox" name="PERCENTAGE" value="PERCENTAGE" /> PERCENTAGE </label></li>
                        <li><label><input type="checkbox" name="ALL" value="ALL" /> ALL </label></li>
                    </ul>


            </div>

            <!-- Waste Type Checkboxes -->
            <div class="wasteType">
                <h3> <u>WASTE TYPE: </u></h3>
                    <ul>
                        <li><label><input type="checkbox" name="Twaste" value="Twaste" /> Trash </label></li>
                        <li><label><input type="checkbox" name="Rwaste" value="Rwaste" /> Recycling </label></li>
                        <li><label><input type="checkbox" name="Gwaste" value="Gwaste" /> Green Waste </label></li>
                        <li><label><input type="checkbox" name="Awaste" value="Awaste" /> ALL </label></li>
                    </ul>
            </div>
            <!-- Date Range  -->

            <input type="submit" value="Submit"> </br>
        </div>
      </form>
        <div class = "bottomBar">
        </br></br></br></br>
        </br></br></br></br>
    </main>
</body>
</html>

<!-- <div class="dateRange">
    <h3> <u>DATE RANGE: </u></h3>
        <ul>
            <li><input type="checkbox" name="date" value="AllDate"> ALL <br> </li>
            <li>From : <input type="date" name="startDate" max="1979-12-31"> To :
                <input type="date" name="endDate" min="2000-01-02"></br></br>
            </li>
</div>
