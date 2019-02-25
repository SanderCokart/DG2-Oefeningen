<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="index.css">
    <title>Tables</title>
</head>

<body>
    <?php include_once "includes/db.inc.php" ?>
    <!-- INPUT FIELDS -->

    <form id="formEdit" action="editClub.php" method="post">
        <input type="submit" id="editT1" value="EDIT"></input>
        <input type="number" placeholder="ID" id="editIDT1" name="editClubId">
    </form>

    <form id="formRemove" action="removeClub.php" method="post">
        <input type="submit" id="removeT1" value="REMOVE"></input>
        <input type="number" placeholder="ID"  id="removeIDT1">
    </form>

    <form action="insertClub.php" method="post">
        <input type="submit" id="insertT1" value="INSERT"></input>
    </form>

    <form action="editMatch.php">
        <input type="submit" id="editT2" value="EDIT"></input>
        <input type="number" name="editGameID" placeholder="ID" id="editIDT2"></input>
    </form>

    <form action="insertMatch.php">
        <input type="submit" id="insertT2" value="INSERT"></input>
    </form>
    <!-- INPUT FIELDS -->

    <!-- CLUBS -->
    <div id="T1">
        <h1>CLUBS</h1>
        <?php
            echo "<table width=\"100%\">";
            echo "<tr>
            <th>ID</th>
            <th>Club Name</th>
            </tr>";

            $sqlget = "SELECT * FROM clubs ORDER BY id;";
            $result = $conn->query($sqlget);

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
    <!-- CLUBS -->

    <!-- GAMES -->
    <div id="T2">
        <h1>GAMES</h1>
        <?php
        echo "<table width=\"100%\">";
        echo "<tr>
        <th>ID</th>
        <th>club1</th>
        <th>eindscore</th>
        <th>club2</th>
        </tr>";

        $sqlget = "SELECT * FROM wedstrijden ORDER BY id;";
        $result = $conn->query($sqlget);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>";
            echo $row['id'];
            echo "</td>";
            echo "<td>";
            echo $row['clubnaam_1'];
            echo "</td>";
            echo "<td>";
            echo $row['eindscore_club_1'] . ' - ' . $row['eindscore_club_2'];
            echo "</td>";
            echo "<td>";
            echo $row['clubnaam_2'];
            echo "</td>";
        }



        echo "</table>";
        ?>
    </div>
    <!-- GAMES -->
</body>

</html>
