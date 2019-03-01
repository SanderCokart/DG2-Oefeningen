<?php
include '../includes/db.inc.php';
if(isset($_POST['insertGameSubmit'], $_POST['club1select'], $_POST['score'], $_POST['club2select'])
&& !isset($_POST['played']) && !empty($_POST['score'])) { // process form on this page
  $club1select = $_POST['club1select'];
  $gameScore = $_POST['score'];
  $club2select = $_POST['club2select'];
  $conn->query("INSERT INTO games (club_1_name, score, club_2_name) VALUES ('$club1select', '$gameScore', '$club2select');");
  $conn->close();
  header('Location: ../organisatorPage.php?submit=succes');
} else if(isset($_POST['played'], $_POST['club1select'], $_POST['club2select'])) {
  $club1select = $_POST['club1select'];
  $club2select = $_POST['club2select'];
  $conn->query("INSERT INTO games (club_1_name, score, club_2_name, played) VALUES ('$club1select', 'N.A.', '$club2select', 1);");
  $conn->close();
  header('Location: ../organisatorPage.php?submit=succes');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles/pages.css">
    <title></title>
  </head>
  <body>
    <div>
        <form action="" method="post">
            <fieldset>
                <legend>Insert Game</legend>
            <select name="club1select">
                <?php
                    $result = $conn->query("SELECT club_name FROM clubs WHERE removed=0");
                    while($row = $result->fetch_assoc()) {
                      echo "<option>".$row['club_name']."</option>";
                    }
                 ?>
            </select>
            <input type="text" name="score" placeholder="score club 1 - score club 2"></input>
            <select name="club2select">
                <?php
                    $result = $conn->query("SELECT club_name FROM clubs WHERE removed=0");
                    while($row = $result->fetch_assoc()) {
                      echo "<option>".$row['club_name']."</option>";
                    }
                 ?>
            </select>
            <input type="checkbox" name="played"></input>
            <input type="submit" name="insertGameSubmit"></input>
        </fieldset>
        </form>
    </div>
  </body>
</html>
