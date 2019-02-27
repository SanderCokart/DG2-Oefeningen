<?php
include '../includes/db.inc.php';

if(isset($_POST['insertGameSubmit']) && isset($_POST['club1select'])
&& isset($_POST['score']) && isset($_POST['club2select'])) { // process form on this page
  $club1select = $_POST['club1select'];
  $gameScore = $_POST['score'];
  $club2select = $_POST['club2select'];

  $conn->query("INSERT INTO games (club_1_name, score, club_2_name) VALUES ('$club1select', '$gameScore', '$club2select')");
  $conn->close();
  header('Location: ../index.php?submit=succes');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Insert game</title>
  </head>
  <body>
    <div>
        <form action="" method="post">
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
            <input type="submit" name="insertGameSubmit"></input>
        </form>
    </div>
  </body>
</html>
