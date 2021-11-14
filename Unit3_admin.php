<?php include 'Unit3_header.php';?>
<?php include 'Unit3_database.php';?>
<?php date_default_timezone_set("America/Denver");?>



<html>
<head>
	<title>PHP Store</title>
	<meta charset="UTF-8">
	<meta name="author" content="Lauren Champlin">
	<link rel="stylesheet" href="Unit3_admin.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>
<body>

<?php
$conn = getConnection();
$customers = getCustomerTable($conn);
$orders = getOrdersTable($conn);
$products = getProductTable($conn);
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<h3> Customers </h3>";
echo "<table border='1'>
<tr>
<th>First name</th>
<th>Last name</th>
<th>Email</th>
</tr>";

while($row = mysqli_fetch_array($customers))
{
echo "<tr>";
echo "<td>" . $row['first_name'] . "</td>";
echo "<td>" . $row['last_name'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "</tr>";
}
echo "</table>";

echo "<br>";
echo "<h3> Orders </h3>";

echo "<table border='1'>
<tr>
<th>Customer</th>
<th>Product</th>
<th>Date</th>
<th>Quantity</th>
<th>Price</th>
<th>Tax</th>
<th>Donation</th>
<th>Total</th>
</tr>";

while($row = mysqli_fetch_array($orders))
{
$customer = findCustomerById($conn, $row['customer_id']);
$product = findProductById($conn, $row['product_id']);

echo "<tr>";
echo "<td>" . $customer['first_name'] . " " . $customer['last_name'] . "</td>";
echo "<td>" . $product['product_name'] . "</td>";
echo "<td>" . date("Y-m-d h:i:sa", $row['timestamp']) . "</td>";
echo "<td>" . $row['quantity'] . "</td>";
echo "<td>" . $row['price'] . "</td>";
echo "<td>" . $row['tax'] . "</td>";
echo "<td>" . $row['donation'] . "</td>";
echo "<td>" . $row['total'] . "</td>";
echo "</tr>";
}
echo "</table>";


echo "<br>";
echo "<h3> Products </h3>";
echo "<table border='1'>
<tr>
<th>Product</th>
<th>Quantity</th>
<th>Price</th>
</tr>";

while($row = mysqli_fetch_array($products))
{
echo "<tr>";
echo "<td>" . $row['product_name'] . "</td>";
echo "<td>" . $row['in_stock'] . "</td>";
echo "<td>" . $row['price'] . "</td>";
echo "</tr>";
}
echo "</table>";


?>

</body>