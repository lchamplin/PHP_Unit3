<?php
error_reporting(E_ALL);
ini_set('display_errors', True);
?>
<?php include 'Unit3_database.php';?>
<?php
$conn = getConnection();

// get the q parameter from URL
$cust = $_REQUEST["name"];
$name = $_REQUEST["n"];

$q = "select * from Customer where ";

if ($name=="f"){
        $q = $q . "first_name like ?";
}else{
        $q = $q . "last_name like ?";
}

$cust = $cust . "%";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $cust);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();


echo "<table id = 'customer_table'>
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
</tr>";

if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
                echo"<tr><td>";
                echo $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['email'] . "</td></tr>";
        }
        echo "</table>";
}
else{
        echo "</table>";
        echo "No suggestions!";
}
?>