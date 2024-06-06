<?php 
/**
 * Start a new session if session is not already started.
 */
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

/**
 * Server and database connection details.
 *
 * @var string $serverName The name of the server.
 * @var string $dbUsername The username for the database connection.
 * @var string $dbPassword The password for the database connection.
 * @var string $dbName The name of the database.
 */
$serverName = "localhost"; 
$dbUsername = "root";      
$dbPassword = "";          
$dbName = "socailmedia";       

// Attempt connection
$con = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

/**
 * Check if the connection to the database is successful.
 * If the connection fails, terminate the script and display the error message.
 *
 * @param  bool  $con
 * @return void
 */
if(!$con) {
    die("Connection failed: ".mysqli_connect_error());
}

?>
