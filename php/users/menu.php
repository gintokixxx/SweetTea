<!DOCTYPE html>
<html lang="eng">
<head>
    <title>Sweettea</title>
    <link rel="stylesheet" href="../../css/menu.css">
    <script defer src="../../js/regLogin.js" type="text/javascript"> </script>

    <?php
        include "../../classes/dbh.classes.php";
    ?>
    
</head>
<body>
    
    <header>

        <div class="head">
            <div class="sweetteas">
                <img src="../../img/login/sweettea logo.png" alt="SweetTea Logo">
            </div>
            <div class="tabs">
                <a href="#">HOME</a>
                <a href="#">ABOUT US</a>
                <a href="#">MENU</a>
                <a href="#" id="coloredsignin">SIGN IN</a>
            </div>
        </div>

    </header>


    <?php
        $select = mysqli_query($conn, "SELECT * FROM items") or die("Query Failed");
        
        $count = 1;
        if($select){

            while($row =mysqli_fetch_assoc($select)){
                $id = $row['pr_id'];
                $name = $row['pr_name'];
                $type = $row['pr_type'];
                $category = $row['pr_category'];
                $varcount = $row['pr_varcount'];
                $description = $row['pr_description'];
                $price = $row['pr_price'];

                $selectImg = mysqli_query($conn, "SELECT image_url FROM items_img WHERE pr_name = '$name'");
                $imgRow = mysqli_fetch_assoc($selectImg);

                if($count == 1){
                    echo'
                    <div class="item-container">
                    <center>
                    ';
                }

                echo '
                <div class="item">
                <form action="includes/cart.inc.php" method="POST"> 

                    <img src="../../img/uploads/'.$imgRow['image_url'].'" alt="">
                    <h3> '.$name.' </h3>
                    <p class="item-description">Midcentury Modern Abstract Pattern in Black and Almond Cream Tote Bag</p>
                    <p class="item-price">P'.$price.'</p>
                    <button class="btn btn-secondary" type="submit" name="submit">Add to Cart</button>
                </form>
                </div>
                ';

                if($count == 3){
                    echo '
                    </center>
                    </div>
                    ';
                }

                $count += 1;
                if($count == 4){
                    $count = 1;
                }
            }
        }
    ?>

    <!-- <th scope="row">'.$id.'</th>
    <td> '.$name.'</td>
    <td> '.$type.'</td>
    <td> '.$category.'</td>
    <td> '.$varcount.'</td>
    <td> '.$price.'</td>
    <td>
    <button id="addB"> <a href="#">Add Variation </a> </button>
    <button id="editB"> <a href="#">Edit </a> </button>
    <button id="removeB"> <a href="delete.php?deleteid='.$id.'">Remove </a> </button>
    </td>

    <div class="product" id="productBags">
        <form action="includes/cart.inc.php" method="POST">
        <img src="images/popular1.png" alt="">
        <p class="product-description">Midcentury Modern Abstract Pattern in Black and Almond Cream Tote Bag</p>
        <p class="product-price">299php</p>
        <button class="btn btn-secondary" type="submit" name="submit">Add to Cart</button>
        <input type="hidden" name="item_name" value="Midcentury Modern Abstract">
        <input type="hidden" name="item_price" value="299">
        <input type="hidden" name="item_subtotal" value="299">
        <input type="hidden" name="item_quantity" value="1">
        </form>
    </div>


    ////////////////////////////////

    <div class="item-container">
        <center>
        <div class="item">
            <form action="includes/cart.inc.php" method="POST">
                <img src="../../img/Rectangle 53.png" alt="">
                <h3> Drink Name </h3>
                <p class="item-description">Midcentury Modern Abstract Pattern in Black and Almond Cream Tote Bag</p>
                <p class="item-price">P299</p>
                <button class="btn btn-secondary" type="submit" name="submit">Add to Cart</button>
            </form>
        </div>

        <div class="item">
            <form action="includes/cart.inc.php" method="POST">
                <img src="../../img/Rectangle 53.png" alt="">
                <h3> Drink Name </h3>
                <p class="item-description">Midcentury Modern Abstract Pattern in Black and Almond Cream Tote Bag</p>
                <p class="item-price">P299</p>
                <button class="btn btn-secondary" type="submit" name="submit">Add to Cart</button>
            </form>
        </div>

        <div class="item">
            <form action="includes/cart.inc.php" method="POST">
                <img src="../../img/Rectangle 53.png" alt="">
                <h3> Drink Name </h3>
                <p class="item-description">Midcentury Modern Abstract Pattern in Black and Almond Cream Tote Bag</p>
                <p class="item-price">P299</p>
                <button class="btn btn-secondary" type="submit" name="submit">Add to Cart</button>
            </form>
        </div>

        <div class="item">
            <form action="includes/cart.inc.php" method="POST">
                <img src="../../img/Rectangle 53.png" alt="">
                <h3> Drink Name </h3>
                <p class="item-description">Midcentury Modern Abstract Pattern in Black and Almond Cream Tote Bag</p>
                <p class="item-price">P299</p>
                <button class="btn btn-secondary" type="submit" name="submit">Add to Cart</button>
            </form>
        </div>
        </center>
    </div> -->
</body>

</html>