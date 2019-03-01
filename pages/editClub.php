<?php
  session_start();
  include '../includes/db.inc.php';
  include '../includes/tools.inc.php';

  // check for existing and non-empty id
  if (!isset($_SESSION['indexEditClubId'])) {
    if(!checkExistanceId('indexEditClubId', 'clubs')) {
      wrongId();
    }
  }
  // get the inserted id from organizerPage.php
  if(isset($_POST['indexEditClubId'])) {
    $_SESSION['indexEditClubId'] = $_POST['indexEditClubId']; // assign id to session for use after submit
    $result = $conn->query(
     "SELECT club_name
      FROM clubs
      WHERE id='$_POST[indexEditClubId]'"
    );
    $row = $result->fetch_assoc();
    $_SESSION['currentClubName'] = $row['club_name'];
    $conn->close();
  }
  // get the new name and give the query to the database
  if(isset($_POST['editClubSubmit'], $_POST['newClubName'])) { // check for submit and if it isn't empty do this
    $conn->query(
     "UPDATE clubs
      SET club_name='$_POST[newClubName]'
      WHERE id='$_SESSION[indexEditClubId]';"
    );
    $conn->query(
      "UPDATE games
      SET club_1_name='$_POST[newClubName]'
      WHERE club_1_name='$_SESSION[currentClubName]';");
    $conn->query(
      "UPDATE games
      SET club_2_name='$_POST[newClubName]'
      WHERE club_2_name='$_SESSION[currentClubName]';");
    $conn->close();
    session_destroy();
    header('Location: ../organizerPage.php');
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../styles/pages.css">
<title>Edit club</title>
</head>
<body>
    <div>
        <form action="" method="post">
          <fieldset>
            <legend>Edit club with the name <?php if(isset($_SESSION['currentClubName'])) { echo $_SESSION['currentClubName']; } ?></legend>
            <input type="text" name="newClubName" value="<?php if(isset($_SESSION['currentClubName'])) {echo $_SESSION['currentClubName'];} ?>"></input>
            <input type="submit" name="editClubSubmit" value="Submit"></input>
          </fieldset>
        </form>
    </div>
</body>
</html>
