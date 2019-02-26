<?php
session_start();
include 'includes/db.inc.php';
include 'includes/idExist.inc.php';

idExists('removeClubId'); // check if id exists in the table

if ($_SESSION['existingId'] == FALSE) { // if the id doesn't exist, stop
  die ("You didn't enter an id or the id doesn't exist! Go back!");
}

if(isset($_POST['removeClubId'])) { // put the id in a session for use after refresh
  $_SESSION['removeClubId'] = $_POST['removeClubId'];
}

if(isset($_POST['removeClubSubmit'])) { // if the form is submitted, process it
  $removeClubReason = $_POST['removeClubReason'];
  $removeClubSolution = $_POST['removeClubSolution'];
  $result = $conn->query("UPDATE clubs SET removed=1, reason='$removeClubReason', solution='$removeClubSolution' WHERE id='$_SESSION[removeClubId]'");
  session_destroy(); // stop session
  $conn->close(); // close connection
  header('Location: index.php'); // redirect to main page
}
?>

<form action="" method="post">
  <input type="text" name="removeClubReason" placeholder="Reason for removal"></input>
  <input type="text" name="removeClubSolution" placeholder="Solution for removal"></input>
  <input type="submit" name="removeClubSubmit" value="Submit"></input>
</form>
