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
  if (isset($_POST['editGameSubmit']) && isset($_POST['editGameClub1Name'])
  && isset($_POST['editGameScore']) && isset($_POST['editGameClub2Name'])) {

    $conn->query(
       "UPDATE games
        SET club_1_name='$_POST[editGameClub1Name]', score='$_POST[editGameScore]', club_2_name='$_POST[editGameClub2Name]'
        WHERE id='$_SESSION[indexEditGameId]';"
    );
    $conn->close();
    session_destroy();
    header('Location: ../index.php');
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
                  $result = $conn->query("SELECT club_1_name, club_2_name
                  FROM games WHERE id='$_SESSION[indexEditGameId]'");
                  $row = $result->fetch_assoc();
                  $currentClub1Name = $row['club_1_name'];
                  $currentClub2Name = $row['club_2_name'];

                  $result = $conn->query(
                    "SELECT club_name FROM clubs WHERE removed=0;"
                  );
                  echo "<select name='editGameClub1Name'>";
                  while($row = $result->fetch_assoc()) {
                    if($row['club_name'] == $currentClub1Name) {
                      echo "<option selected>" . $row['club_name'] . "</option>";
                    } else {
                      echo "<option>" . $row['club_name'] . "</option>";
                    }
                  }
                  echo "</select>";
                  ?>

                  <?php
                  $result = $conn->query(
                    "SELECT score FROM games WHERE id='$_SESSION[indexEditGameId]';"
                  );
                  $row = $result->fetch_assoc();
                  echo "<input type='text' name='editGameScore' placeholder=" . $row['score'] . "></input>";
                  ?>

                  <?php
                  echo "<select name='editGameClub2Name'>";
                  $result = $conn->query(
                    "SELECT club_name FROM clubs WHERE removed=0;"
                  );
                  while($row = $result->fetch_assoc()) {

                    if($row['club_name'] == $currentClub2Name) {
                      echo "<option selected>" . $row['club_name'] . " </option>";
                    } else {
                      echo "<option>" . $row['club_name'] . "</option>";
                    }
                  }
                  echo "</select>";
                  $conn->close();
                ?>
                <input type="submit" name="editGameSubmit"></input>
            </fieldset>
        </form>
    </div>
  </body>
</html>
<div>
</div>
