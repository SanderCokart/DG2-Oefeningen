<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/player.css">
    <title></title>
  </head>
  <body>

    <?php include "includes/db.inc.php"?>
    <div id="T1">
        <table width="100%">
            <?php
                echo "<tr>
                <th>Club 1</th>
                <th>Score</th>
                <th>Club 2</th>
                </tr>";

                $result = $conn->query("SELECT * FROM games ORDER BY id;");

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>";
                    echo $row['club_1_name'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['score'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['club_2_name'];
                    echo "</td>";
                }
             ?>
        </table>
    </div>
  </body>
</html>
