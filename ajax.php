<html>
<body>
<div id="skywardsLogin" style="display: block;">
            <div class="formContainer" id="loginDetails">
                <form action="#" id="frmLogin" class="homeWidget">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="formLabel" width="100">
                                <label for="skywardsNumber" title="Skywards Number">
                                    Skywards Number</label></td>
                            <td>
                                <input class="formField" id="skywardsNumber" name="skywardsNumber" size="25" type="text" /></td>
                            <td class="formLink">
                                <a class="iconHelpBox" href="#">Forgot number</a></td>
                        </tr>
                        <tr>
                            <td class="formLabel">
                                <label for="password">
                                    Password</label></td>
                            <td>
                                <input class="formField" id="password" name="password" size="25" type="password" /></td>
                            <td class="formLink">
                                <a class="iconHelpBox" href="#">Forgot password</a></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="horRuleWhite">
                <hr />
            </div>
            <div class="continueBar">
                <div class="continueBarLeft">
                    <p class="validateTips" style="color: Red">
                    </p>
                </div>
                <div class="continueBarRightButton">
                    <input alt="Log In" id="loginButton" src="system/images/form_buttons/button_log_in.gif"
                        title="Log In" type="image" />
                    <div id="ajaxloading" style="display: none">
                        <img align="absmiddle" src="system/images/spinner.gif" alt="Processing..."/>&nbsp;Processing...
                    </div>
                </div>
            </div>
        </div>
		
<script>
		 $('#skywardsLoginLink').click(function(){
        $('#skywardsLogin').dialog({
            autoOpen: true,
            width: 450,
            modal: true,
            title: 'Login to your Skywards Account'
        });
        if($('#skywardsLogin').is(':visible')) {
            hideSelect();
        } else {
            showSelect();
        }
    });

//Login Button Clicked
$('#loginButton').click(function()
{
    var bValid = true;
    bValid = bValid && checkLength( skywardNo, "Skyward No", 3, 16 );
    bValid = bValid && checkLength( password, "password", 5, 16 );

    if ( bValid ) 
    {      
       $("#loginDetails > form").submit();
        allFields.val("");
        tips.text("");
    }
});

 //Submitting the form
$("#loginDetails > form").submit(function()
{  
    //Hiding the Login button
    ("#loginButton").hide();

    //Showing the ajax loading image
    ("#ajaxloading").show();

    // 'this' refers to the current submitted form  
    var str = $(this).serialize();   
    // -- Start AJAX Call --

    $.ajax({  
        type: "POST",
        url: "Login.aspx",  // Send the login info to this page
        data: str,  
        success: function(msg)
        {  

            $("#loginDetails").ajaxComplete(function(event, request, settings){  

             // Show 'Submit' Button
            $('#loginButton').show();

            // Hide Gif Spinning Rotator
            $('#ajaxloading').hide();  

             if(msg == 'OK') // LOGIN OK?
             {  
                $('a.modalCloseImg').hide();  

                $(this).html(login_response); // Refers to 'status'

            // After 3 seconds redirect the 
            //setTimeout('go_to_private_page()', 3000); 
         }  
         else // ERROR?
         {  
             var login_response = msg;
             $('#login_response').html(login_response);
         }  

     });  

     }  

    });  

    // -- End AJAX Call --

    return false; 
});      
</script>
</body>
</html>