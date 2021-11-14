<!-- include database.php
make a connection to the database
But here I do:

$id = $_GET["prod"];  // get the id from the GET superglobal
call getPuzzleQuantity, passing in $conn and $id (store return value in $quantity)
echo $quantity; // this is what provides responseText to the Ajax call -->

<?php include 'Unit3_database.php';?>


<?php

$conn = getConnection();
$id = $_GET["id"];
echo getQuantity($conn, $id);


?>