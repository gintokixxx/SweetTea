<!DOCTYPE html>
<html lang="eng">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,700;1,400&family=Playfair+Display:ital,wght@1,400;1,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&display=swap" rel="stylesheet">


    <title>Sweettea</title>
    <link rel="stylesheet" href="../../css/users/menu.css">

    <?php
        include "../../classes/dbh.classes.php";
                
        session_start();

        if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {

        } else {
            header('Location: userSignin.php?access=denied');
            exit();
        }
    ?>
    
</head>
<body>
    <section class="sec1" id="top">
        <header class="grid-container">
            <img src="../../img/users/Sweettea logo.svg" alt="sweettea">

            <nav>
                <a href="./Home Page/home.php">Home</a>
                <a href="./AboutUs/aboutus.php">About Us</a>
                <a href="#navtitle">Menu</a>
                <a id="cart" href="cart.php">Cart</a>
            </nav>
        </header>

        <main class="grid-container">
                <div class="menu">
                    <br><br><h1>MENU</h1>
                    <h3>A Liter of Tea is a multilitter of words equals the <br>amount of love that I gave to you.</h3>
                    <p>A tea that makes your milk taste like a tea with black jelly balls came from the <br>tomb of the raider in michigan city under the fire nation.</p>
                    <button> <a href="#navtitle">  Order Now! </a></button><br>

                    <div class="menudel">
                        <a href="/"><img src="../../img/users/grab.svg" alt="Grab Logo"></a>
                        <a href="/"><img src="../../img/users/foodpanda.svg" alt="FoodPanda Logo"></a>
                    </div>
                </div>
        </main>
    </section>

    <section class="sec2">
        <div class="grid-container">

            <div class="labelbar">
                <h4><a href="menuMilktea.php">Milktea</a></h4>
                <h4>|</h4>
                <h4><a href="menuCoffee.php">Coffee</a></h4>
                <h4>|</h4>
                <h4><a href="menuFruitTea.php">Fruit Tea</a></h4>
                <h4>|</h4>
                <h4 style="color: #E27396"><a href="menuLemonade.php">Lemonade</a></h4>
                <h4>|</h4>
                <h4><a href="menuSnacks.php">Snacks</a></h4>
            </div>

            <div class="navbar">
                <a href="menuCoffee.php"><</a>
                <a id="navtitle" href="#">Lemonade</a>
                <a href="menuLemonade.php">></a>
            </div>

            <?php
                    $select = mysqli_query($conn, "SELECT * FROM items WHERE pr_category ='Lemonade'") or die("Query Failed");
                    
                    if($select){

                        while($row =mysqli_fetch_assoc($select)){
                            $id = $row['pr_id'];
                            $name = $row['pr_name'];
                            $type = $row['pr_type'];
                            $category = $row['pr_category'];
                            $description = $row['pr_description'];
                            $price = $row['pr_price'];

                            $selectImg = mysqli_query($conn, "SELECT image_url FROM items_img WHERE pr_name = '$name'");
                            $imgRow = mysqli_fetch_assoc($selectImg);

                            echo '

                            <div class="polaroiddesc" id="'.$id.'">
                            <form action="../../includes/cart.inc.php" method="POST"> 
                                <div class="polaroid">
                                    <img src="../../img/uploads/'.$imgRow['image_url'].'" alt="">
                                    <h3>'.$name.'</h3>
                                    <h4> '.$description.'</h4>
                                    <input type="hidden" name="productId" value="'.$id.'">
                                    <button data-hover="Add to Cart" type="submit" name="submit">P'.$price.'</button>
                                </div>
                            </form>
                            </div>
                            ';


                        }
                    }
                ?>

                <div class="labelbar">
                    <h4><a href="menuMilktea.php">Milktea</a></h4>
                    <h4>|</h4>
                    <h4><a href="menuCoffee.php">Coffee</a></h4>
                    <h4>|</h4>
                    <h4><a href="menuFruitTea.php">Fruit Tea</a></h4>
                    <h4>|</h4>
                    <h4 style="color: #E27396"><a href="menuLemonade.php">Lemonade</a></h4>
                    <h4>|</h4>
                    <h4><a href="menuSnacks.php">Snacks</a></h4>
                </div>
        </div>
    </section>

    <section class="sec3">
        <div class="grid-container">
            <div class="footerlogo">
                <img src="../../img/users/sweetteafooter.svg" alt="SweetTea Makati">
            </div>
            
            <div class="quicklink">
                <h3>Quick Links</h3>
                
                <nav>
                    <a href="./Home Page/home.php">Home</a><br>
                    <a href="./AboutUs/aboutus.php">About Us</a><br>
                    <a href="#navtitle">Menu</a><br>
                    <a href="userSignin.php">Sign In</a><br>
                    <a href="#top">Top</a>
                </nav>
            </div>

            <div class="contactus">
                <h3>Contact Us</h3>
                
                <nav>
                    <h3>2001 A&M Bldg M. Reyes St.</h3>
                    <h3>sweettea.bangkal@gmail.com</h3>
                    <h3>09455792955</h3>
                    <a href="https://www.facebook.com/sweettea.bangkal" target="_blank"><img src="../../img/users/Facebook.svg" alt="Facebook"></a>
                    <a href="https://www.instagram.com/sweetteabangkal" target="_blank"><img src="../../img/users/instagram.svg" alt="Instagram"></a>
                </nav>
            </div>
        </div>
    </section>
</body>

</html>