<?php include 'Unit3_database.php';?>


<?php

$conn = getConnection();
$id = $_GET["id"];
echo getQuantity($conn, $id);
?>
