<?php
session_start();
include '../includes/db.inc.php';
include '../includes/tools.inc.php';

if(!isset($_SESSION['indexRemoveClubId'])) {
  if(!checkExistanceId('indexRemoveClubId', 'clubs')) { // check if id exists in the table
    wrongId();
  }
}
// put the id in a session for use after refresh
if(isset($_POST['indexRemoveClubId'])) {
  $_SESSION['indexRemoveClubId'] = $_POST['indexRemoveClubId'];
  $result = $conn->query("SELECT club_name FROM clubs WHERE id='$_SESSION[indexRemoveClubId]'");
  $row = $result->fetch_assoc();
  $_SESSION['currentName'] = $row['club_name'];
}
// if the form is submitted, process it
if(isset($_POST['removeClubSubmit'], $_POST['removeClubReason'], $_POST['removeClubSolution'])) {
  $removeClubReason = $_POST['removeClubReason'];
  $removeClubSolution = $_POST['removeClubSolution'];
  $result = $conn->query("UPDATE clubs SET club_name='{$_SESSION[currentName]}REMOVED', removed=1, reason='$removeClubReason', solution='$removeClubSolution' WHERE id='$_SESSION[indexRemoveClubId]'");
  $conn->query("DELETE FROM games
    WHERE club_1_name='$_SESSION[currentName]' AND played=1 OR club_2_name='$_SESSION[currentName]' AND played=1;");
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
                    <legend>Remove club "<?php echo $_SESSION['currentName']; ?>"</legend>
                    <input type="text" name="removeClubReason" placeholder="Reason for removal"></input>
                    <input type="text" name="removeClubSolution" placeholder="Solution for removal"></input>
                    <input type="submit" name="removeClubSubmit" value="Submit"></input>
                </fieldset>
            </form>
        </div>
    </body>
</html>
