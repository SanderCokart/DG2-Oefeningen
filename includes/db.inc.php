<?php
//Login information
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "wedstrijd_oefening";

//Create connection object
$conn = new mysqli($hostname, $username, $password, $dbname);

//If there's an error, stop
if ($conn->connect_error) {
  die ('Connection failed'.$conn->connect_error);
}
?>
