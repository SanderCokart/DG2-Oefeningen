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
          <?php
          $result = $conn->query("SELECT * FROM games WHERE id='$_SESSION[indexEditGameId]'");
          $row = $result->fetch_assoc();
          ?>
            <fieldset>
                <legend>Edit Game</legend>
                <input type="text" name="editGameClub1Name" placeholder="<?php echo $row['club_1_name']; ?>"></input>
                <input type="text" name="editGameScore" placeholder="<?php echo $row['score']; ?>"></input>
                <input type="text" name="editGameClub2Name" placeholder="<?php echo $row['club_2_name']; ?>"></input>
                <input type="submit" name="editGameSubmit"></input>
            </fieldset>
        </form>
    </div>
  </body>
</html>
<div>
</div>
