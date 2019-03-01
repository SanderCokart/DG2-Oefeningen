<?php
session_start();
include '../includes/db.inc.php';
include '../includes/tools.inc.php';

if(!isset($_SESSION['indexRemoveClubId'])) {
  if(!checkExistanceId('indexRemoveClubId', 'clubs')) { // check if id exists in the table
    wrongId();
  }
}

if(isset($_POST['indexRemoveClubId'])) { // put the id in a session for use after refresh
  $_SESSION['indexRemoveClubId'] = $_POST['indexRemoveClubId'];
  $result = $conn->query("SELECT club_name FROM clubs WHERE id='$_SESSION[indexRemoveClubId]'");
  $row = $result->fetch_assoc();
  $removeClubName = $row['club_name'];
}

if(isset($_POST['removeClubSubmit'])) { // if the form is submitted, process it
  $removeClubReason = $_POST['removeClubReason'];
  $removeClubSolution = $_POST['removeClubSolution'];
  $result = $conn->query("UPDATE clubs SET removed=1, reason='$removeClubReason', solution='$removeClubSolution' WHERE id='$_SESSION[indexRemoveClubId]'");
  session_destroy(); // stop session
  $conn->close(); // close connection
  header('Location: ../organizerPage.php'); // redirect to main page
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <link rel="stylesheet" href="../styles/pages.css">
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <div>
            <form action="" method="post">
                <fieldset>
                    <legend>Remove club "<?php echo $removeClubName; ?>"</legend>
                    <input type="text" name="removeClubReason" placeholder="Reason for removal"></input>
                    <input type="text" name="removeClubSolution" placeholder="Solution for removal"></input>
                    <input type="submit" name="removeClubSubmit" value="Submit"></input>
                </fieldset>
            </form>
        </div>
    </body>
</html>
