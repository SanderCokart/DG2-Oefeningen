<?php
include_once "includes/db.inc.php";

if (isset($_POST['clubName'])) { // process form, give query and redirect to index.php
  $clubName = $_POST['clubName'];
  $conn->query("INSERT INTO clubs (club_name) VALUES ('$clubName')"); // query to add the club
  $conn->close();
  header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Insert a club</title>
    </head>
    <body>
      <div id="insert">
        <form action="" method="post">
          <fieldset>
            <legend>Enter club name</legend>
            <input type="text" name="clubName" placeholder="Insert name">
            <input type="submit">
          </fieldset>
        </form>
      </div>
    </body>
</html>
