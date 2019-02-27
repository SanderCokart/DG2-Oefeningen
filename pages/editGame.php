<?php
  session_start();
  include '../includes/db.inc.php';
  include '../includes/tools.inc.php';

  if (!isset($_SESSION['editGameId'])) {
    if(!checkExistanceId('editGameId', 'games')) {
      wrongId();
    }
  }

  if(isset($_POST['editGameId'])) { // get the id from previous page
    $_SESSION['editGameId'] = $_POST['editGameId'];
  }

  if (isset($_POST['editGameSubmit']) && isset($_POST['editGameClub1Name'])
  && isset($_POST['editGameScore']) && isset($_POST['editGameClub2Name'])) { // process form

    $editGameClub1Name = $_POST['editGameClub1Name'];
    $editGameScore = $_POST['editGameScore'];
    $editGameClub2Name = $_POST['editGameClub2Name'];


    $conn->query(
      "UPDATE games
       SET club_1_name='$editGameClub1Name', score='$editGameScore', club_2_name='$editGameClub2Name'
       WHERE id='$_SESSION[editGameId]';"
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
    <title>Edit game</title>
  </head>
  <body>
    <div>
        <form action="" method="post">
          <?php
          $result = $conn->query("SELECT * FROM games WHERE id='$_SESSION[editGameId]'");
          $row = $result->fetch_assoc();
          ?>
            <input type="text" name="editGameClub1Name" placeholder="<?php echo $row['club_1_name']; ?>"></input>
            <input type="text" name="editGameScore" placeholder="<?php echo $row['score']; ?>"></input>
            <input type="text" name="editGameClub2Name" placeholder="<?php echo $row['club_2_name']; ?>"></input>
            <input type="submit" name="editGameSubmit"></input>
        </form>
    </div>
  </body>
</html>
<div>
</div>
