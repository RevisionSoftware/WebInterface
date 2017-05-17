<?php include "../inc/dbinfo.inc"; ?>
<?php

    // Web Server connection info
    $DB_SERVER = "trashtrackerdb.cfoy99pm7oyj.us-west-1.rds.amazonaws.com";
    $DB_USERNAME = "wschultz";
    $DB_PASSWORD = "RecyclinG";
    $DB_DATABASE = "TRASH_TRACKER_DB";

    // Connection to AWS Web Server
    $connection = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);

    //Check the connection
    if(mysqli_connect_errno()){
        die("Connection Failed. ERR: " . mysqli_connect_error());
    }

    return $connection;
?>
