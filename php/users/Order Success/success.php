<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,700;1,400&family=Playfair+Display:ital,wght@1,400;1,700&display=swap" rel="stylesheet">

    <!--My CSS-->
    <link rel="stylesheet" href="success.css">
</head>

<body>
    <header>
        <div class="grid-container">
            <img src="Sweettea logo.svg" alt="sweettea">
            <nav>
                <a href="../Home Page/home.php">Home</a>
                <a href="../AboutUs/aboutus.php">About Us</a>
                <a href="../menuMilktea.php">Menu</a>
                <a id="cart" href="../cart.php">Cart</a>
            </nav>
        </div>
    </header>

    <!--Order Success-->
    <section class="success" id="top">
        <div class="grid-container">
            <div class="bluebox">
                <img src="check.png" alt="check">
                <button><a href="../Home Page/home.php">Return Home </a></button> 
            </div>
            
        </div>
    </section>

    <footer class="grid-container">
        <div class="footerlogo">
            <img src="sweetteafooter.svg" alt="SweetTea Makati">
            
        </div>
        
        <div class="quicklink">
            <h3>Quick Links</h3>
            
            <nav>
                <a href="../Home Page/home.php">Home</a><br>
                <a href="../AboutUs/aboutus.php">About Us</a><br>
                <a href="../menuMilktea.php">Menu</a><br>
                <a href="userSiginin.php">Sign In</a><br>
                <a href="#top">Top</a>
            </nav>
        </div>

        <div class="contactus">
            <h3>Contact Us</h3>
            
            <nav>
                <h3>2001 A&M Bldg M. Reyes St.</h3>
                <h3>sweettea.bangkal@gmail.com</h3>
                <h3>09455792955</h3>
                <a href="https://www.facebook.com/sweettea.bangkal" target="_blank"><img src="Facebook.svg" alt="Facebook"></a>
                <a href="https://www.instagram.com/sweetteabangkal" target="_blank"><img src="instagram.svg"></a>
            </nav>
        </div>
    </footer>
</body>