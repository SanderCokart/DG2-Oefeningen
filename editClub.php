<?php
  session_start();
  include 'includes/db.inc.php';

if (empty($_POST['editClubId'])) {
  die ("No id of club has been entered! Go back");
  header('Location: index.php');
}

  if(isset($_POST['editClubId'])) {
    $_SESSION['editClubId'] = $_POST['editClubId'];
    $result = $conn->query("SELECT club_name FROM clubs WHERE id=1");
    // $oldClubName = $result->fetch_assoc();
  }

  if(isset($_POST['newClubName'])) {
    $newClubName = $_POST['editClubId'];
    $conn->query("UPDATE club_name SET club_name='.$newClubName.' WHERE id=".$_SESSION['editClubId']);
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Edit club</title>
</head>
<body>

<?php

echo 'Edit club with the name ' . $oldClubName;

?>

<form action="" method="post">
  <fieldset>
    <legend> Edit club name </legend>
    <input type="text" name="newClubName" value=".<?php if(isset($oldClubName)) {echo $oldClubName;} ?>."></input>
  </fieldset>
</form>

</body>
</html>
