<?php
  session_start();
  include 'includes/db.inc.php';

  if (isset($_POST['editClubId'])) { // check if id exists in the clubs table
    $result = $conn->query("SELECT id FROM clubs"); // get every id from the table
    $existingId = FALSE; // standard value is false
    while ($row = $result->fetch_assoc()) { // check if id exists in table
      if ($_POST['editClubId'] == $row['id']) { // the id exists in table
        $existingId = TRUE;
        echo $_POST['editClubId'];
        break;
      }
    }
  }

  if(isset($_POST['editClubId']) && !empty($_POST['editClubId']) && $existingId == TRUE) { // get the inserted id from index.php
    $_SESSION['editClubId'] = $_POST['editClubId'];
    $result = $conn->query("SELECT club_name FROM clubs WHERE id='$_POST[editClubId]'");
    $row = $result->fetch_assoc();
    $currentClubName = $row['club_name'];
  } else if (!isset($_SESSION['editClubId']) || $existingId == FALSE){ // if the user didn't insert an id
    die ("You didn't enter an id or the id doesn't exist! Go back!");
    header('Location: index.php');
  }

  if(isset($_POST['newClubName'])) { // get the new name and give the query to the database
    $newClubName = $_POST['newClubName'];
    $conn->query("UPDATE clubs SET club_name='$newClubName' WHERE id=".$_SESSION['editClubId']);
    session_stop();
    header('Location: index.php');
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
    <input type="submit" name="" value="Submit"></input>
  </fieldset>
</form>
</body>
</html>
