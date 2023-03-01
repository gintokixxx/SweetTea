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
                <div class="item" id="'.$id.'">
                <form action="../../includes/cart.inc.php" method="POST"> 

                    <img src="../../img/uploads/'.$imgRow['image_url'].'" alt="">
                    <h3> '.$name.' </h3>
                    <p class="item-description">'.$description.'</p>
                    <p class="item-price">P'.$price.'</p>
                    <input type="hidden" name="productId" value="'.$id.'">
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
</body>

</html>