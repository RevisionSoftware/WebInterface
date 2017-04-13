<?php
    //Create a basic connection
    $connection = mysqli_connect("localhost", "snedd001", "snedd001", "snedd001");
    //Check the connection
    if(mysqli_connect_errno()){
        die("Connection Failed. ERR: " . mysqli_connect_error());
    }
    return $connection;
?>
