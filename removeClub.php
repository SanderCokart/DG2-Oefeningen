<?php
session_start();
include 'includes/db.inc.php';
include 'includes/tools.inc.php';

if(!checkExistanceId('removeClubId', 'clubs')) { // check if id exists in the table
  wrongId();
}

if (!$_SESSION['existingId']) { // if the id doesn't exist, stop
  die ("You didn't enter an id or the id doesn't exist! Go back!");
}

if(isset($_POST['removeClubId'])) { // put the id in a session for use after refresh
  $_SESSION['removeClubId'] = $_POST['removeClubId'];
  $result = $conn->query("SELECT club_name FROM clubs WHERE id='$_SESSION[removeClubId]'");
  $row = $result->fetch_assoc();
  $removeClubName = $row['club_name'];
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
  <fieldset>
    <legend>Remove club "<?php echo $removeClubName; ?>"</legend>
    <input type="text" name="removeClubReason" placeholder="Reason for removal"></input>
    <input type="text" name="removeClubSolution" placeholder="Solution for removal"></input>
    <input type="submit" name="removeClubSubmit" value="Submit"></input>

  </fieldset>
</form>
