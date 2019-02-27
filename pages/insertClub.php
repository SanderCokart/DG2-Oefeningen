<?php
  include_once "../includes/db.inc.php";

  // process form, give query and redirect to index.php
  if (isset($_POST['insertClubSubmit']) && isset($_POST['clubName'])) {
    $clubName = $_POST['clubName'];
    $conn->query("INSERT INTO clubs (club_name) VALUES ('$clubName')"); // query to add the club
    $conn->close();
    header('Location: ../index.php');
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../styles/pages.css">
        <title>Insert a club</title>
    </head>
    <body>
      <div id="insert">
        <form action="" method="post">
          <fieldset>
            <legend>Enter club name</legend>
            <input type="text" name="clubName" placeholder="Insert name">
            <input type="submit" name="insertClubSubmit">
          </fieldset>
        </form>
      </div>
    </body>
</html>
