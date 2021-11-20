        
$(document).ready(function(){
        $("#submit").click(function(e){
        e.preventDefault();
        console.log("submit");
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var product = $("#product").val();
        var quantity = $("#quantity").val();
        var timestamp = $("#timestamp").val();
        // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'fname1='+ fname + '&lname1='+ lname +'&email1='+ email + '&product1='+ product + '&quantity1='+ quantity + '&timestamp1='+ timestamp;
        console.log(dataString);
        if(fname==''||lname==''||email==''||product==null||quantity==null||timestamp=='')
        {
                if(fname==''||lname==''||email==''){
                        alert("Please Fill All Fields");
                        return false;
                }
                if(product==null){
                        alert("Please select a product");
                        return false;
                }
                if(quantity==null){
                        alert("Please select a quantity");
                        return false;
                }
        }
		
        else
        {
        // AJAX Code To Submit Form.
        $.ajax({
        type: "POST",
        url: "Unit3_ajaxsubmit.php",
        data: dataString,
        cache: false,
        success: function(result){
        alert(result);
        }
        });
        }
        
        });
        });
        
        