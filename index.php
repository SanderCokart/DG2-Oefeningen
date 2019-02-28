<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/index.css">
    <title>Tables</title>
</head>

<body>
    <?php include_once "includes/db.inc.php" ?>
    <!-- INPUT FIELDS -->

    <!-- edit form voor clubs -->
    <form id="formEdit" action="pages/editClub.php" method="post">
        <input type="submit" id="editT1" value="EDIT"></input>
        <input type="number" name="indexEditClubId" placeholder="ID" id="editIDT1">
    </form>
    <!-- remove form voor clubs -->
    <form id="formRemove" action="pages/removeClub.php" method="post">
        <input type="submit" id="removeT1" value="REMOVE"></input>
        <input type="number" name="indexRemoveClubId" placeholder="ID"  id="removeIDT1">
    </form>

    <!-- insert form voor clubs -->
    <form action="pages/insertClub.php" method="post">
        <input type="submit" id="insertT1" value="INSERT"></input>
    </form>

    <!-- edit form voor games -->
    <form action="pages/editGame.php" method="post">
        <input type="submit" id="editT2" value="EDIT"></input>
        <input type="number" name="indexEditGameId" placeholder="ID" id="editIDT2"></input>
    </form>

    <!-- insert form voor games -->
    <form action="pages/insertGame.php" method="post">
        <input type="submit" id="insertT2" value="INSERT"></input>
    </form>
    <!-- INPUT FIELDS -->

    <!-- CLUBS -->
    <div id="T1">
        <h1>CLUBS</h1>
        <?php
          // destroy sessions if the user left the page without submitting, this would give the user the ability to edit a removed club
          session_start();
          session_destroy();
            echo "<table width=\"100%\">";
            echo "<tr>
            <th>ID</th>
            <th>Club Name</th>
            </tr>";

            $result = $conn->query("SELECT * FROM clubs WHERE removed=0 ORDER BY id;");

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>";
                echo $row['id'];
                echo "</td>";
                echo "<td>";
                echo $row['club_name'];
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
         ?>
    </div>
    <!-- CLUBS  -->

    <!-- GAMES -->
    <div id="T2">
        <h1>GAMES</h1>
        <?php
        echo "<table width=\"100%\">";
        echo "<tr>
        <th>ID</th>
        <th>Played</th>
        <th>Club 1</th>
        <th>Score</th>
        <th>Club 2</th>
        </tr>";

        $result = $conn->query("SELECT * FROM games ORDER BY id;");

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>";
            echo $row['id'];
            echo "</td>";
            echo "<td>";
            echo $row['played'] ? 'Not played' : 'Played';
            echo "</td>";
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
        echo "</table>";
        ?>
    </div>
    <!-- GAMES -->
</body>

</html>
