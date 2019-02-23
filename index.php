<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="index.css">
    <title>Tabel</title>
</head>

<body>
    <?php include_once "includes/db.inc.php" ?>
    <!-- INPUT FIELDS -->
    <button type="button" id="editT1">EDIT</button>
    <input type="number" placeholder="ID" id="editIDT1">
    <button type="button" id="removeT1">REMOVE</button>
    <input type="number" placeholder="ID"  id="removeIDT1">
    <button type="button" id="insertT1">INSERT</button>
    <button type="button" id="editT2">EDIT</button>
    <input type="number" placeholder="ID" id="editIDT2"></input>
    <button type="button" id="insertT2">INSERT</button>
    <!-- INPUT FIELDS -->
    <!-- CLUBS -->
    <div id="T1">
        <?php
            echo "<table width=\"100%\">";
            echo "<tr>
            <th>ID</th>
            <th>Club Name</th>
            </tr>";

            echo "</table>";
         ?>
    </div>
    <!-- CLUBS -->

    <!-- GAMES -->
    <div id="T2">
        <?php
        echo "<table width=\"100%\">";
        echo "<tr>
        <th>ID</th>
        <th>Club Name</th>
        </tr>";

        echo "</table>";
        ?>
    </div>
    <!-- GAMES -->
</body>

</html>
