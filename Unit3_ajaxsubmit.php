<?php
include 'Unit3_database.php';

$conn = getConnection();


function processOrder($conn){
//Fetching Values from URL
$fname2=$_POST['fname1'];
$lname2=$_POST['lname1'];
$email2=$_POST['email1'];
$product2=$_POST['product1'];
$quantity2=$_POST['quantity1'];
$timestamp2=$_POST['timestamp1'];

//Insert query
$newCust = findCustomer($conn, $email2);
$product = findProductById($conn, $product2);
$product_name = $product['product_name'];
$price = $product['price'];
$subtotal = $price * $quantity2;
$tax = $subtotal * 0.03;
$tax_price = $subtotal + $tax;
$total = $tax_price;
$donation = 0.0;

$newQty = $product['in_stock'] - $quantity2;
if ($newQty < 0) { // ensure no negative amounts
        return "Invalid quantity";
}

updateQuantity($conn, $product2, $newQty);

if ($newCust != 0) {
	addOrder($conn, $newCust['id'], $product2, $quantity2, $price, $tax, $donation, $total, $timestamp2);
}
else{
	addCustomer($conn, $fname2, $lname2, $email2);
	$cust = findCustomer($conn, $email2);
	addOrder($conn, $cust['id'], $product2, $quantity2, $price, $tax, $donation, $total, $timestamp2);
}
return "Order entered successfully";
}
echo processOrder($conn);
?>

