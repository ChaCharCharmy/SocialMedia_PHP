<?php
require "../functions.php"; 

// Run logout function from functions.php
logout();

// Redirect to the admin page.
header("Location: admin.php"); 

?>