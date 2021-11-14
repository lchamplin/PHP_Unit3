<?php include 'Unit3_database.php';?>


<?php

include 'Unit3_database.php'
$conn = getConnection();
$id = $_GET["id"];
echo $id;
echo getQuantity($conn, $id);
?>
