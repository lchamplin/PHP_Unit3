<?php include 'Unit3_header.php';?>
<?php include 'Unit3_database.php';?>
<?php date_default_timezone_set("America/Denver");?>



<html>
<head>
	<title>PHP Store</title>
	<meta charset="UTF-8">
	<meta name="author" content="Lauren Champlin">
	<link rel="stylesheet" href="Unit3_order_entry.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>
<body>

<form action="Unit3_process_order.php" method="post">
        <span>
        <br>
        <div class="personal">
        <fieldset class="personal">
    <legend>Personal</legend>
                <br>
                First Name: * <input type="text" name="fname" required pattern="[a-zA-Z'].{1,}"><br>
                Last Name: * <input type="text" name="lname" required pattern="[a-zA-Z'].{1,}"><br>
                E-mail: * <input type="email" name="email" required><br>
        </fieldset>
        </div>

          <div class="product">
   <fieldset class="product">
    <legend>Product</legend>
                <br>
      
                <select id="product" name="product" required onchange="showStock(this.value)">
                        <option disabled selected hidden>Choose a product *</option>
                        <?php $Product = getProducts(getConnection()); ?>
                        <?php if ($Product): ?>
                        <?php foreach($Product as $row): ?>
                                <option value = <?= $row['id']?>  data-image="<?= $row['image_name'] ?>" data-qty="<?= $row['in_stock'] ?>" > <?= $row['product_name'] ?> - <?= $row['price'] ?> </option>
                        <?php endforeach?>
                        <?php endif?>
                        </select>
                        <br>
                Available: <input id="stock" type="text" name="stock" readonly>
                <br>
                Quantity: * <input type="number" name="quantity" min=1 max=100  value=1 required><br>
</fieldset>
         
        <input type="hidden" name="timestamp" value="<?php echo time(); ?>" required>
</div>
<span>
        <button id="submit" type="submit">Purchase</button>
        <button id="clear" type="reset">Clear Fields</button>
</span>
</span>

</form>

</body>
</html>

 <?php include 'Unit3_footer.php';?>

<script>

        function showStock(str) {
                console.log(str);
                if(str==""){
                        return;
                }
                else{
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {                                
                        if (this.readyState == 4 && this.status == 200){
                                document.getElementById("stock").value = this.responseText;
                                }
                        };
                        xhttp.open("GET", "Unit3_get_quantity.php?id="+str, true);
                        xhttp.send();
                }
        }
</script>
