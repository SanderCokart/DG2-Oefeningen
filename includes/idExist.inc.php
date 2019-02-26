<?php
// function for checking if the id exists
function idExists($idToCheck) {
  include 'db.inc.php';
  if (isset($_POST[$idToCheck])) { // check if id exists in the clubs table

    $result = $conn->query("SELECT id FROM clubs WHERE removed=0"); // get every id from the table
    $_SESSION['existingId'] = FALSE; // standard value is false

    while ($row = $result->fetch_assoc()) { // check if id exists in table
      if ($_POST[$idToCheck] == $row['id']) { // the id exists in table
        $_SESSION['existingId'] = TRUE;
        break;
      }
    }

  }
}


 ?>
