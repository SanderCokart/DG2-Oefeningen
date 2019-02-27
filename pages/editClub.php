<?php
  session_start();
  include '../includes/db.inc.php';
  include '../includes/tools.inc.php';

  if (!isset($_SESSION['editClubId'])) {
    if(!checkExistanceId('editClubId', 'clubs')) {
      wrongId();
    }
  }

  if(isset($_POST['editClubId']) && !empty($_POST['editClubId'])) { // get the inserted id from index.php
    $_SESSION['editClubId'] = $_POST['editClubId'];
    $result = $conn->query("SELECT club_name FROM clubs WHERE id='$_POST[editClubId]'");
    $row = $result->fetch_assoc();
    $currentClubName = $row['club_name'];
  }

  if(isset($_POST['editClubSubmit']) && isset($_POST['newClubName'])) { // get the new name and give the query to the database
    $newClubName = $_POST['newClubName'];
    $conn->query("UPDATE clubs SET club_name='$newClubName' WHERE id=".$_SESSION['editClubId']);
    session_destroy();
    $conn->close();
    header('Location: ../index.php');
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Edit club</title>
</head>
<body>
<form action="" method="post">
  <fieldset>
    <legend>Edit club with the name <?php if(isset($currentClubName)) { echo $currentClubName; } ?></legend>
    <input type="text" name="newClubName" value="<?php if(isset($currentClubName)) {echo $currentClubName;} ?>"></input>
    <input type="submit" name="editClubSubmit" value="Submit"></input>
  </fieldset>
</form>
</body>
</html>
