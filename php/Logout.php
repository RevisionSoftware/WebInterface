<?php
//This will end the session, remove session variables and direct users back to the homepage after logout
Session_start();
Session_destroy();
header("Location: ../php/LoginPage.php");
?>
