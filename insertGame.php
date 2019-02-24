<?php
include_once "includes/db.inc.php";

if(isset($_POST['submit'])) {
  $club_1         = $_POST['club_1'];
  $club_1_score   = $_POST['club_1_score'];
  $club_2         = $_POST['club_2'];
  $club_2_score   = $_POST['club_2_score'];
}

if (isset($club_1) && isset($club_1_score) && isset($club_2) && isset($club_2_score)) {
  $conn->query("INSERT INTO wedstrijden (clubnaam_1, eindscore_club_1, clubnaam_2, eindscore_club_2) VALUES ('$club_1','$club_1_score','$club_2','$club_2_score')"); // Query to add the club
}
?>

<!DOCTYPE <html></html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Insert Game</title>
    </head>
    <body>
      <div id="insert">
        <form action="" method="post">
            <select name="club_1">
                <?php
                  $result = $conn->query("SELECT * FROM clubs ORDER BY id;");
                  while ($row = $result->fetch_assoc()) {
                    echo "<option>".$row['club_name']."</option>";
                  }
                ?>
             </select>
            <input type="text" name="club_1_score" placeholder="insert score of first club">
            <select name="club_2">
              <?php
                $result = $conn->query("SELECT * FROM clubs ORDER BY id;");
                while ($row = $result->fetch_assoc()) {
                    echo "<option>".$row['club_name']."</option>";
                }
              ?>
         </select>
            <input type="text" name="club_2_score" placeholder="insert score of second club">
            <input type="submit">
        </form>
      </div>
    </body>
</html>
