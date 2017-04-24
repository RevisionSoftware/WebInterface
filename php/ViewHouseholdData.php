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
    <!-- END HEADER: MUST BE ON ALL PAGES -->

    <main>
        <div class="centered">
            <!-- Main Page HTML goes here -->
            <h1> VIEW HOUSEHOLD DATA </h1>

            <!-- Route Type Checkboxes -->

            <!-- Account Num  -->
            <div class="SearchType">
                <h2> <u>Search by: </u></h2>
                <form action="/action_page.php">
                    <label> Account Number: </label><input type="text" name="FirstName" value=""><br>
                    <label> or Address: </label><input type="text" name="LastName" value="">
                </form>


            </div>
            <!-- Route Type Checkboxes -->
            <div class="viewType">
                <h3> <u>VIEW HOUSEHOLD: </u></h3>
                <form action="">
                    <ul>
                        <li><label><input type="checkbox" name="BIN IN/OUT" value="1" /> BIN IN/OUT </label></li>
                        <li><label><input type="checkbox" name="WEIGHT" value="2" /> WEIGHT </label></li>
                        <li><label><input type="checkbox" name="PERCENTAGE" value="3" /> PERCENTAGE </label></li>
                        <li><label><input type="checkbox" name="ALL" value="4" /> ALL </label></li>
                    </ul>

                </form>
            </div>

            <!-- Waste Type Checkboxes -->
            <div class="wasteType">
                <h3> <u>WASTE TYPE: </u></h3>
                <form action="">
                    <ul>
                        <li><label><input type="checkbox" name="waste" value="1" /> Trash </label></li>
                        <li><label><input type="checkbox" name="waste" value="2" /> Recycling </label></li>
                        <li><label><input type="checkbox" name="waste" value="3" /> Green Waste </label></li>
                        <li><label><input type="checkbox" name="waste" value="4" /> ALL </label></li>
                    </ul>
                </form>
            </div>
            <!-- Date Range  -->
            <div class="dateRange">
                <h3> <u>DATE RANGE: </u></h3>
                <form action="">
                    <ul>
                        <li><input type="checkbox" name="date" value="2"> ALL <br> </li>
                        <li>From : <input type="date" name="startDate" max="1979-12-31"> To :
                            <input type="date" name="endDate" min="2000-01-02">
                            <input type="submit"> </br>
                        </li>
                </form>
            </div>
        </div>
        <div class = "bottomBar">
        </br></br></br></br>
        </br></br></br></br>
    </main>
</body>

</html>