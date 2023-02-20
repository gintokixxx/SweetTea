<!DOCTYPE html>
<html lang="eng">
<head>
    <title>Sweettea</title>
    <script defer src="../js/regValidation.js" type="text/javascript"> </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function checkUsername(){
            jQuery.ajax({
                url:"check_availability.php",
                data:'username='+$("#username").val(),
                type:"POST",

                success:function(data){
                    $("#error-user").html(data);
                },
                error:function(){}
            });
        }

    </script>

    <link rel="stylesheet" href="../css/registration.css">
</head>
<body>

    
    <header>

        <div class="head">
        <div class="sweetteas">
            <a href="#">SWEETTEA</a>
        </div>
        <div class="tabs">
            <a href="#">HOME</a>
            <a href="#">ABOUT US</a>
            <a href="#">MENU</a>
            <a href="#" id="coloredsignin">SIGN IN</a>
        </div>
        </div>
   
    </header>

    <div class="centerbox">
        <div id="bluebox">
            <img src="../img/mockup 1.png" alt="milktea" >
        </div>
        
        <div class="formcontent">
            <div>
                <div class="welcometext">
                    <p id="wsttext">Welcome to SweetTea</p>
                    <p id="wscaption">Sign Up to Continue</p>
                </div>
                
                <div id="formbox">
                    <form action="../includes/signup.inc.php" method="post" id="form">
                        <div id="labelandboxes">

                        <div class="input-control"> 
                            <label for="username" class="userlbl">Username:</label><br>
                            <input type="text" id="username" size="50" maxlength="50"  class="textbox" name="username" oninput="checkUsername()"><br>
                            <small id="error-user"> &nbsp;</small> 
                        </div>

                        <div class="input-control"> 
                            <label for="email" class="emaillbl">E-mail:</label><br>
                            <input type="text" id="email" size="50" maxlength="50" class="textbox" name="email"><br>
                            <small>&nbsp;</small> 
                        </div>

                        <div class="input-control"> 
                            <label for="password" class="passlbl">Password:</label><br>
                            <input type="password" id="password" size="50" maxlength="16" class="textbox" name="password"><br>
                            <small>&nbsp;</small> 
                        </div>

                        <div class="input-control"> 
                            <label for="cpassword" class="cpasslbl">Confirm Password:</label><br>
                            <input type="password" id="cpassword" size="50" maxlength="16" class="textbox" name="cpassword"><br>
                            <small>&nbsp;</small> 
                        </div>

                        </div>

                        <div id="signupbttn">
                            <button type="submit" id="signup" name="submit"> Sign Up </button>
                        </div>

                        <div id="formfooter">
                            <p> Already have an account? <a href="https://www.facebook.com">Sign In</a> </p>
                        </div>                 
                    </form>
                </div>


            </div>
        </div>
    </div>
</body>

</html>