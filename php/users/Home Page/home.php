<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweet Tea | Home </title>

    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,700;1,400&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!--My CSS-->
    <link rel="stylesheet" href="home.css">
</head>
<body>

    <header class="grid-container">
        <img src="Sweettea logo.svg" alt="" class="logo">
            <nav>
            <a href="../Home Page/home.php">Home</a>
                <a href="../AboutUs/aboutus.php">About Us</a>
                <a href="../menuMilktea.php">Menu</a>
                <a id="cart" href="../cart.php">Cart</a>
            </nav>
        </header>
    </header>

    <!--Main Page-->
    <section class="main">
        <div class="grid-container">
            <div class="litermilktea">
                <h1>One Liter Milktea</h1>
                <p>Satisfy your cravings with a delicious cup 
                of milk tea from Sweet Tea. Our unique 
                blends are expertly crafted to offer a 
                sweet and creamy taste that will leave 
                you wanting more.</p>
            
                <div class="btn">
                    <button>Order Now</button>
                </div>
            </div>
            
            <div class="pict">
                <img src="yinyangmilktea.svg" alt="splash">
            </div>
        </div>
    </section>

    <section class="featured">
        <div class="grid-container">
            <div class="features grid-container">
                <h3>Featured Products</h3>  
            
                <a href="https://www.facebook.com/photo/?fbid=528181586115702&set=pb.100067715950429.-2207520000.">
                    <img src="img sources/featured/fp creamcheese.jpg" alt="FoodPanda Logo"></a>
                <a href="https://www.facebook.com/photo/?fbid=518254733775054&set=a.409859077947954">
                    <img src="img sources/featured/fp footlong.jpg" alt="Grab Logo"></a>
                <a href="https://www.facebook.com/photo/?fbid=513031270964067&set=a.409859071281288">
                    <img src="img sources/featured/fp pancit.jpg" alt="FoodPanda Logo"></a>
            </div>
        </div>
    </section>

    <!--Quick Links-->
    <section class="qlink">
        <div class="grid-container">
            <div class="about card">
                <h1>About Us</h1>
                <p>Welcome to our Milk Tea community! 
                Sweettea Family who are passionate 
                about sharing our love for this 
                delicious beverage with the world.</p>
            </div>
                
            
            <div class="menu card">
                <h1>Menu</h1>
                <p>We are dedicated to creating the 
                perfect cup of Milk Tea with a 
                variety of flavors and combinations to 
                satisfy any craving. Our team of Milk 
                Tea experts carefully curate each 
                ingredient to ensure the perfect 
                balance of tea, milk, and sweetness.</p>
            </div>
            
            <div class="cart card">
                <h1>Cart</h1>
                <p>We're excited to offer a smooth 
                and hassle-free checkout process 
                that makes ordering your favorite 
                drink easier than ever. Join us and 
                check out your cart today!"</p>
            </div>
        </div>
    </section>

    <!--Gallery-->
    <section class="gallery">
        <div class="grid-container">
            <div class="img-con">
                <div class="perpiccon grid-container">
                    <img src="img sources/gallery/g1.png" alt="g1">
                    <img src="img sources/gallery/g2.jpg" alt="g2">
                    <img src="img sources/gallery/g3.jpg" alt="g3">
                    <img src="img sources/gallery/g4.png" alt="g4">
                    <img src="img sources/gallery/g5.jpg" alt="g5">
                    <img src="img sources/gallery/g6.png" alt="g6">
                    <img src="img sources/gallery/g7.jpg" alt="g7">
                    <img src="img sources/gallery/g8.jpg" alt="g8">
                    <img src="img sources/gallery/g9.jpg" alt="g9">
                    <img src="img sources/gallery/g10.jpg" alt="g10">
                    <img src="img sources/gallery/g11.png" alt="g11">
                    <img src="img sources/gallery/g12.jpg" alt="g12">
                </div>
                    
            </div>
        </div>
        
    </section>

    <!--Contact Us-->
    <form action="../../../includes/contactus.inc.php" method="post" id="myForm">
    <section class="contact">
            <div class="grid-container">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.929877295942!2d121.00800891469548!3d14.546002582312372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9a356e33f25%3A0x9e732558c5e0f82!2sSweetTea%20-%20Bangkal!5e0!3m2!1sen!2sph!4v1677430759557!5m2!1sen!2sph" width="90%" height="90%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <div class="ctitle">
                        <p>Contact Us<span><br>We'd love to hear from you</span></p>
                        <div class="inputbox grid-container">
                            <input type="text" placeholder="Name*" name="name" required/>
                            <input type="text" placeholder="Email*" name="email" required/>
                            <input id="subj" type="text" placeholder="Subject*" name="subject"required />
                            <div class="msg">
                                <input type="text" placeholder="Message*" name="text" required />
                            </div>
                        </div>
                        <button type="submit" name="submit">Send</button>

                </div>

                
            </div>
    </section>
    </form>

    <!--Footer-->
    <footer class="grid-container">
        <div class="footerlogo">
            <img src="sweetteafooter.svg" alt="SweetTea Makati">
        </div>
        
        <div class="quicklink">
            <h3>Quick Links</h3>
            
            <nav>
                <a href="home.php">Home</a><br>
                <a href="../AboutUs/aboutus.php">About Us</a><br>
                <a href="../menuMilktea.php">Menu</a><br>
                <a href="../userSignin.php">Sign In</a><br>
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
                <a href="https://www.instagram.com/sweetteabangkal" target="_blank"><img src="instagram.svg" alt="Instagram"></a>
            </nav>
        </div>
    </footer>
</body>
</html>