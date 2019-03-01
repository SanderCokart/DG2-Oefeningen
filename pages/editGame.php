<?php
  session_start();
  include '../includes/db.inc.php';
  include '../includes/tools.inc.php';

  // check for existing and non-empty id
  if (!isset($_SESSION['indexEditGameId'])) {
    if(!checkExistanceId('indexEditGameId', 'games')) {
      wrongId();
    }
  }

  // get the id from previous page and put it in a session for use after submit
  if(isset($_POST['indexEditGameId'])) {
    $_SESSION['indexEditGameId'] = $_POST['indexEditGameId'];
  }

  // process the form and send a query
  if (isset($_POST['editGameSubmit']) && isset($_POST['editGameSelectClub1'])
  && isset($_POST['editGameScore']) && isset($_POST['editGameSelectClub2'])) {

    $conn->query(
       "UPDATE games
        SET club_1_name='$_POST[editGameSelectClub1]', score='$_POST[editGameScore]', club_2_name='$_POST[editGameSelectClub2]'
        WHERE id='$_SESSION[indexEditGameId]';"
    );
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
    <title>Edit game</title>
  </head>
  <body>
    <div>
        <form action="" method="post">
            <fieldset>
                <legend>Edit Game</legend>
                <?php
                  // query for all the created club names
                  $result = $conn->query("SELECT club_name FROM clubs WHERE removed=0;");
                  while($row = $result->fetch_assoc()) {
                    $clubNames[] = $row['club_name'];
                  }
                  // query for the current score of the game
                  $result = $conn->query("SELECT score FROM games WHERE id='$_SESSION[indexEditGameId]';");
                  $row = $result->fetch_assoc();
                  $editGameScore = $row['score'];
                  // query for the current club 1 and club 2 names
                  $result = $conn->query("SELECT club_1_name, club_2_name FROM games WHERE id='$_SESSION[indexEditGameId]';");
                  $row = $result->fetch_assoc();
                  $currentClub1Name = $row['club_1_name'];
                  $currentClub2Name = $row['club_2_name'];

                  $conn->close();
                ?>
                <select name="editGameSelectClub1">
                <?php
                  foreach($clubNames as $clubName) {
                    if($clubName == $currentClub1Name) {
                      echo "<option name=" . $clubName . " selected>" . $clubName . "</option>";
                    } else {
                      echo "<option name=" . $clubName . ">" . $clubName . "</option>";
                    }
                  }
                ?>
                </select>
                <input type="text" name="editGameScore" placeholder="<?php echo $editGameScore; ?>">
                <select name="editGameSelectClub2">
                <?php
                  foreach($clubNames as $clubName) {
                    if($clubName == $currentClub2Name) {
                      echo "<option name=" . $clubName . " selected>" . $clubName . "</option>";
                    } else {
                      echo "<option name=" . $clubName . ">" . $clubName . "</option>";
                    }
                  }
                ?>
                </select>
                <input type="submit" name="editGameSubmit"></input>
            </fieldset>
        </form>
    </div>
  </body>
</html>
<div>
</div>
