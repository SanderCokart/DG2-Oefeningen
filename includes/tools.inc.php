<?php
// function for checking if the id exists
function checkExistanceId($idToCheck, $table) {
  include 'db.inc.php';
  if ($table == "clubs") {
    $sql = "SELECT id FROM clubs WHERE removed=0";
  } else if ($table == "games") {
    $sql = "SELECT id FROM games";
  }
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) { // check if id exists in
    if ($_POST[$idToCheck] == $row['id']) { // the id exists in table
      return true;
    }
  }
}


function wrongId() {
  die ("<body style= 'background-color: navajowhite;width: 100vw; height: 100vh; overflow: hidden;'><div width='100vw' height='100vh' style='font-size:8vh;font-family: sans-serif,helvetica,arial; text-align:center; text-transform: uppercase;'><p>The id doesn't exist or the id field has been left empty</p><img style='display: inline-block' src=https://accountingpl.us/assets/images/screenshots/treeguy.jpg width='500'><br>GET OUT OF HERE THIS IS MY WORLD!<div></body>");
}


 ?>
