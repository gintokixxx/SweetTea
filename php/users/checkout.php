<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HeaderFooter Template</title>
    <link rel="stylesheet" href="../../css/checkout.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <?php
        include "../../classes/dbh.classes.php";
    ?>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&family=Playfair+Display:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <header class="grid-container">
        <img src="img sources/header & footer/Sweettea logo.svg" alt="sweettea">
        <nav>
            <a href="/">Home</a>
            <a href="/">About Us</a>
            <a href="/">Menu</a>
            <a id="cart" href="/">Cart</a>
        </nav>
    </header>

    <div class="midcart">
        <h3>Cart</h3> 
    </div>
    
        
    <!--Left Panel 1fr-->
    <form action="../../includes/checkout.inc.php" method="post" id="form">
    <div class="grid-container-whole">
        <div class="place-order">
            <!-- 1 Order Details -->
            <h1><span>1</span> Order Details</h1>

            <div class="text-box">
                <input type="text" placeholder="Name" name="customerName" required><br>
                <input type="text" placeholder="Contact Number" name="customerNumber" required>
            </div>

            <!-- 2 Pick up only -->
            <h1><span>2</span> Pick up only</h1>

            <!-- 3 E-Payment -->
            <h1><span>3</span> E-Payment</h1>

            <div class="radio-box">
                    <input type="radio" name="e-payment" value="Gcash" placeholder="Gcash" required>
                        <label>Gcash</label>
                    <input type="radio" name="e-payment" value="Credit Card" required>
                        <label>Credit Card</label>
            </div>

            <div class="container">
                <p>We accept the following modes of payment: 
                BPI, BDO, Security Bank, and Gcash. Kindly
                wait for an email confirmation from 
                sweettea.bangkal@gmail.com regarding the 
                availability and total amount of your 
                purchase. Payment due date will be 24 hours 
                from receipt of the Sweettea's Specialist's email 
                confirmation. <br><br><br>
    

                For any questions or concerns, please email 
                us at sweettea.bangkal@gmail.com.  Thank you 
                very much for your order!</p>
            </div>

            <!-- 4 Review and place order -->
            <h1><span>4</span>Review and place order</h1>
            <p id="rpo">Review the order details above, and place your 
            order when you’re ready.</p>
            
            <div class="check-box">
                    <input type="checkbox" name="review" value="Yes">
                    <label>Send me marketing communications via email or SMS.</label>
            </div>

            <!-- Submit -->
            <div>
                <input id="placeorder" type="submit" value="Place order" name="submit">
            </div>
        </div>

        <!--Order Summary-->
        <div class="order-summary">
            <h2>Order Summary <a href="#">Edit Cart</a> </h2>
            <?php
            $select = mysqli_query($conn, "SELECT * FROM usercart") or die("Query Failed");
            
            $count = 1;
            if($select){

                while($row =mysqli_fetch_assoc($select)){
                    $id = $row['pr_id'];
                    $name = $row['pr_name'];
                    $quantity = $row['user_quantity'];
                    $size = $row['pr_size'];
                    $price = $row['pr_price'];
                    $type = $row['pr_type'];
                    $addons = $row['user_addons'];
                    $subtotal = $row['user_subtotal'];
                    $cartId = $row['cart_id'];

                    $selectImg = mysqli_query($conn, "SELECT image_url FROM items_img WHERE pr_name = '$name'");
                    $imgRow = mysqli_fetch_assoc($selectImg);

                    echo'
                    <div class="product">
                        <div class="pic">
                            <img src="../../img/uploads/'.$imgRow['image_url'].'">
                        </div>

                        <div class="definition">
                            <p>'.$name.'';
                            if($addons != ""){
                                echo ' with '.$addons.' ';
                            }
                            echo'
                            ('.$size.')</p>
                            <p>Qty: '.$quantity.'</p> 
                        </div>

                        <div class="price">
                            <p><b>₱'.$subtotal.'</b></p>
                        </div>
                    </div>
                    ';

                }}?>

            <div class="detail">
                <p>Pick-Up at SweetTea Bangkal Branch</p>
            </div>
            <h1>TOTAL P900</h1>
        </div>
    </div>
    </form>

    <section class="foot">
        <footer class="grid-container">
            <div class="footerlogo">
                <img src="img sources/header & footer/sweetteafooter.svg" alt="SweetTea Makati">
            </div>
            
            <div class="quicklink">
                <h3>Quick Links</h3>
                
                <nav>
                    <a href="#">Home</a><br>
                    <a href="#">About Us</a><br>
                    <a href="#">Menu</a><br>
                    <a href="#">Sign In</a><br>
                    <a href="#">Top</a>
                </nav>
            </div>
    
            <div class="contactus">
                <h3>Contact Us</h3>
                
                <nav>
                    <h3>2001 A&M Bldg M. Reyes St.</h3>
                    <h3>sweettea.bangkal@gmail.com</h3>
                    <h3>09455792955</h3>
                    <a href="#"><img src="img sources/header & footer/Facebook.svg" alt="Facebook"></a>
                    <a href="#"><img src="img sources/header & footer/instagram.svg" alt="Instagram"></a>
                </nav>
            </div>
        </footer>
    </section>
</body>
</html>