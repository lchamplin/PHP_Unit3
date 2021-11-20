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
        <script src="Unit3_script.js"></script>


</head>
<body>
<div id='left'>
<form action="Unit3_ajaxsubmit.php" method="post">
        <span>
        <br>
        <div class="personal">
        <fieldset class="personal">
    <legend>Personal</legend>
                <br>
                First Name: * <input type="text" name="fname" id="fname" required onkeyup="showHint(this.value, 'f')"><br>
                Last Name: * <input type="text" name="lname" id="lname" required onkeyup="showHint(this.value, 'l')"><br>
                E-mail: * <input type="email" name="email" id="email" required><br>
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
                Quantity: * <input type="number" name="quantity" id="quantity" min=1 max=100  value=1 required><br>
</fieldset>
         
        <input type="hidden" name="timestamp" id="timestamp" value="<?php echo time(); ?>" required>
</div>
<span>
        <button id="submit" type="submit">Submit</button>
        <button id="clear" type="reset">Clear Fields</button>
</span>
</span>

</form>
</div>

<div id='right'>
<p>Choose an existing customer:</p>
<table id="display-table" class="table-layout">
    
</table>
</div>




<script>
        
        
        function showStock(str) {
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

        // highlight_row();

function highlight_row() {
    var table = document.getElementById('display-table');
    var cells = table.getElementsByTagName('td');

    for (var i = 0; i < cells.length; i++) {
        // Take each cell
        var cell = cells[i];
        // do something on onclick event for cell
        cell.onclick = function () {
            // Get the row id where the cell exists
            var rowId = this.parentNode.rowIndex;

            var rowsNotSelected = table.getElementsByTagName('tr');
            for (var row = 0; row < rowsNotSelected.length; row++) {
                rowsNotSelected[row].style.backgroundColor = "";
                rowsNotSelected[row].classList.remove('selected');
            }
            var rowSelected = table.getElementsByTagName('tr')[rowId];
            rowSelected.style.backgroundColor = "yellow";
            rowSelected.className += " selected";

        //     msg = 'The ID of the company is: ' + rowSelected.cells[0].innerHTML;
        //     msg += '\nThe cell value is: ' + this.innerHTML;
        //     alert(msg);

            document.getElementById("fname").value = rowSelected.cells[0].innerHTML;
            document.getElementById("lname").value = rowSelected.cells[1].innerHTML;
            document.getElementById("email").value = rowSelected.cells[2].innerHTML;
        }
    }

}
      
        function showHint(str, name){
                if(str.length==0){
                        document.getElementById("right").innerHTML = "";
                        return;
                }
                else{
                        const xmlhttp = new XMLHttpRequest();
                        xmlhttp.onload = function() {
                                document.getElementById("right").innerHTML = this.responseText;
                                highlight_row();
                        }
                        xmlhttp.open("GET", "Unit3_get_customer_table.php?name="+str+"&&n="+name);
                        xmlhttp.send();
                }
        }

</script>

</body>
</html>

 <?php include 'Unit3_footer.php';?>