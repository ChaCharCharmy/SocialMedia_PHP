<?php
require "functions.php";
require "dbfunctions.php";

logout();

// Redirects the user to the homepage (index.php).
header("Location: index.php"); 
?>