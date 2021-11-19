1. In the traditional model, the form's action specifies what happens when the submit button is pressed. How does the sample code connect the submit button to jQuery? (i.e., what line(s) of code do this).
The line of code "$("#submit").click(function(){..." gets the element with id "submit" which is of course the submit button and connects it in the jQuery file.

2. What PHP file will be executed on the server?
ajaxsubmit.php (This is the only php file in the example, right?)

3. How does this code collect data from the form to pass to the server/php?
The code collects data from the HTML form and uses POST to pass the data to php.

4. What line of JavaScript code is executed in the callback function?
The callback executes the "alert(result);" line of code.

5. How does the PHP function provide the value to be displayed in the callback function? (i.e., what line of code "returns" the message that is displayed).
The PHP file returns/echos a success message in the line "echo "Form Submitted Succesfully";" to be displayed in the alert.
