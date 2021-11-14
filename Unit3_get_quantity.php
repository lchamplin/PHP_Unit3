<?php include 'Unit3_database.php';?>


<?php

function debug_to_console($data) {
	$output = $data;
	if (is_array($output))
		$output = implode(',', $output);
	echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
debug_to_console("here");
include 'Unit3_database.php'
$conn = getConnection();
$id = $_GET["id"];
debug_to_console($id);
echo getQuantity($conn, $id);
?>
