<!-- SANDER -->
<?php
function checkConn(){
    if ($conn->connect_error) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
}

    $servername = "localhost";
    $databasename = "wedstrijd_oefening";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $databasename);
?>
<!-- SANDER -->
<!-- LARS -->

<!-- LARS -->
