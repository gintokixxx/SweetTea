<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../../css/cart.css">
    <?php
        include "../../classes/dbh.classes.php";
    ?>
    
</head>
<body>
    <header>
        <div class="heading">

            <div class="sweettealogo">
                <img src="sweettea logo.png" alt="SweetTea Logo">
            </div>

            <div class="tabs">
                <a href="#">Home</a>
                <a href="#">About Us</a>
                <a href="#">Menu</a>
                <a id="cart" href="#">Cart</a>
            </div>

        </div>
    </header>

    <div class="content">
        <p id="midcart">Cart</p>
    </div>

    <form action="../../includes/cartsubmit.inc.php" method="post" id="form">
    <div class="cart">
    <?php
        $select = mysqli_query($conn, "SELECT * FROM usercart") or die("Query Failed");
        
        $count = 1;
        if($select){

            while($row =mysqli_fetch_assoc($select)){
                $id = $row['pr_id'];
                $name = $row['pr_name'];
                $quantity = $row['user_quantity'];
                $price = $row['pr_price'];
                $type = $row['pr_type'];
                $addons = $row['user_addons'];
                $subtotal = $row['user_subtotal'];
                $cartId = $row['cart_id'];

                $selectImg = mysqli_query($conn, "SELECT image_url FROM items_img WHERE pr_name = '$name'");
                $imgRow = mysqli_fetch_assoc($selectImg);


                if($type === 'Drinks'){
                echo'
                <div class="item"  id="'.$cartId.'">
                <div class="varorder">
        
                    <div class="polaroidcontainer">
                        <div class="polaroid">
        
                            <div class="picture">
                                <img src="../../img/uploads/'.$imgRow['image_url'].'">
                            </div>
        
                            <div class="milkteaname">
                                <label for="classicmilktea">'.$name.'</label>
                            </div>
        
                        </div>
                    </div>
        
                    <div class="exitbutton">
                        <a href="../../includes/deletecart.inc.php?deleteid='.$cartId.'">X</a>
                    </div>
        
                    <div class="item"> 

                        <label id="addons" for="Addons">Add Ons</label><br>

                        <label> <input type="checkbox" class="checkbox" value="5"> Creamcheese </label> 
                        <label> <input type="checkbox" class="checkbox" value="5"> Pearls </label> <br>
        
                        <label> <input type="checkbox" class="checkbox" value="10"> Oreo </label>
                        <label> <input type="checkbox" class="checkbox" value="10"> Milo </label> <br>
    
                        <label> <input type="checkbox" class="checkbox" value="10"> Caramel </label> 
                        <label> <input type="checkbox" class="checkbox" value="10"> Nata </label> <br>

                        <label> <input type="checkbox" class="checkbox" value="15"> Fruit Jelly </label>
                        <label> <input type="checkbox" class="checkbox" value="15"> Coffee Jelly </label> <br>
    
                        <label> <input type="checkbox" class="checkbox" value="10"> Yakult </label>
                        <label> <input type="checkbox" class="checkbox" value="10"> Ice </label> <br>
    
                    ';

                        $selectVariation = mysqli_query($conn, "SELECT * FROM items_variation WHERE pr_name='$name' ORDER BY pr_variation_price ASC;") or die("Query Failed");

                        echo '<select name="item_variation[]" class="select-variation">';

                        if($selectVariation){
                            while($rowVariation =mysqli_fetch_assoc($selectVariation)){
                                $variationName = $rowVariation['pr_variation_name'];
                                $variationPrice = $rowVariation['pr_variation_price'];

                                echo '<option value="'.$variationPrice.'" class="pr_select_options"> '.$variationName.'</option> ';
                            }
                        }
                        
                        echo ' 
                        </select> 
                        <input type="number" value="1" class="quantity-input">
                        <br>
                        <p>Total <span  class="subtotal"> '.$price.'</span></p>

                        <input type="hidden" name="cartProductId[]" value="'.$id.'">
                        <input type="hidden" name="cartCartId[]" value="'.$cartId.'">
                        <input type="hidden" name="cartProductName[]" value="'.$name.'">
                        <input type="hidden" name="cartUserQuantity[]" class="cart_user_quantity" value="">
                        <input type="hidden" name="cartProductPrice[]" class="cart_product_price" value="">
                        <input type="hidden" name="cartUserAddons[]" class="cart_user_addons" value="">
                        <input type="hidden" name="cartUserSubtotal[]" class="cart_user_subtotal" value="">
                    
                        </div>

                    </div> 
                    </div>
                    ';
                } else {
                    echo '
                    <div class="item"  id="'.$cartId.'">
                        <div class="varorder">
                            <div class="polaroidcontainer">
                                <div class="polaroid">
                                    <div class="picture">
                                        <img src="../../img/uploads/'.$imgRow['image_url'].'">
                                    </div>
                                </div>
                            </div>   
                            
                            <div class="item">
                                <h3> '.$name.' </h3>';
                                $selectVariation = mysqli_query($conn, "SELECT * FROM items_variation WHERE pr_name='$name' ORDER BY pr_variation_price ASC;") or die("Query Failed");

                                echo '<select name="item_variation[]" class="select-variation">';

                                if($selectVariation){
                                    while($rowVariation =mysqli_fetch_assoc($selectVariation)){
                                        $variationName = $rowVariation['pr_variation_name'];
                                        $variationPrice = $rowVariation['pr_variation_price'];
        
                                        echo '<option value="'.$variationPrice.'" class="pr_select_options"> '.$variationName.'</option> ';
                                    }
                                }
                                echo '
                                </select> 
                                <input type="number" value="1" class="quantity-input">
                                <br>
                                <p>Total <span  class="subtotal"> '.$price.'</span></p>

                                <input type="hidden" name="cartProductId[]" value="'.$id.'">
                                <input type="hidden" name="cartCartId[]" value="'.$cartId.'">
                                <input type="hidden" name="cartProductName[]" value="'.$name.'">
                                <input type="hidden" name="cartUserQuantity[]" class="cart_user_quantity" value="">
                                <input type="hidden" name="cartProductPrice[]" class="cart_product_price" value="">
                                <input type="hidden" name="cartUserAddons[]" class="cart_user_addons" value="">
                                <input type="hidden" name="cartUserSubtotal[]" class="cart_user_subtotal" value="">
                                
                            </div>
                
                            <div class="exitbutton">
                                <a href="../../includes/deletecart.inc.php?deleteid='.$cartId.'">X</a>
                            </div>
                        </div>
                    </div>
                    ';
                }
            }
        }
    ?>

        <input type="submit" name="submitButton" value="Submit" >
    </form>

    <script type="text/javascript">
        // Get the saved cart data from localStorage
        var cartData = localStorage.getItem('cartData');
        if (cartData) {
            cartData = JSON.parse(cartData);
            // Loop through each item in the cart data
            for (var i = 0; i < cartData.length; i++) {
                var itemId = cartData[i].id;
                var quantity = cartData[i].quantity;
                var addons = cartData[i].addons;
                var variation = cartData[i].variation;
                var subtotal = cartData[i].subtotal;

                // Set the default quantity
                var quantityInput = document.querySelector('#' + itemId + ' .quantity-input');
                quantityInput.value = quantity;

                // Set the default checkboxes
                var checkboxes = document.querySelectorAll('#' + itemId + ' input[type="checkbox"]');
                for (var j = 0; j < checkboxes.length; j++) {
                    var checkbox = checkboxes[j];
                    if (addons.indexOf(checkbox.value) !== -1) {
                        checkbox.checked = true;
                    }
                }

                // Set the default variation and subtotal
                var variationSelect = document.querySelector('#' + itemId + ' .select-variation');
                var variationOptions = variationSelect.options;
                for (var k = 0; k < variationOptions.length; k++) {
                    if (variationOptions[k].value == variation) {
                        variationSelect.selectedIndex = k;
                        break;
                    }
                }
                var subtotalElement = document.querySelector('#' + itemId + ' .subtotal');
                subtotalElement.textContent = subtotal;
            }
        }


        function updateItem(cartId) {
            const item = document.getElementById(cartId);
            const quantityInput = item.querySelector('.quantity-input');
            const selectVariation = item.querySelector('.select-variation');
            const checkboxes = item.querySelectorAll('.checkbox');
            const subtotal = item.querySelector('.subtotal');
            
            // Update the subtotal based on the quantity and selected variation
            const quantity = parseInt(quantityInput.value);
            const variationPrice = parseInt(selectVariation.value);

            const addonsPrice = Array.from(checkboxes)
                .filter(checkbox => checkbox.checked)
                .reduce((total, checkbox) => total + parseInt(checkbox.value), 0);

            const itemSubtotal = (variationPrice + addonsPrice) * quantity;
            subtotal.textContent = itemSubtotal.toFixed(2);
            
            // Save the user's choices in the local storage
            const userChoices = {
                quantity: quantity,
                variationName: selectVariation.options[selectVariation.selectedIndex].text,
                variationPrice: variationPrice,
                addons: Array.from(checkboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.parentElement.textContent.trim()),
                addonsPrice: addonsPrice,
                subtotal: itemSubtotal.toFixed(2)
            };
            localStorage.setItem(cartId, JSON.stringify(userChoices));
        }

        const items = document.querySelectorAll('.item');
        items.forEach(item => {
        const cartId = item.id;
        const quantityInput = item.querySelector('.quantity-input');
        const checkboxes = item.querySelectorAll('.checkbox');
        const selectVariation = item.querySelector('.select-variation');
        const subtotalElement = item.querySelector(".subtotal");


        const hiddenQuantity = item.querySelector('.cart_user_quantity');
        const hiddenPrice = item.querySelector('.cart_product_price');
        const hiddenSize = item.querySelector('.cart_product_size');
        const hiddenAddons = item.querySelector('.cart_user_addons');
        const hiddenSubtotal = item.querySelector('.cart_user_subtotal');

        
        // Restore the user's choices from the local storage
        const userChoices = JSON.parse(localStorage.getItem(cartId));
        if (userChoices) {
            quantityInput.value = userChoices.quantity;
            selectVariation.value = userChoices.variationPrice;
            Array.from(checkboxes)
            .filter(checkbox => userChoices.addons.includes(checkbox.parentElement.textContent.trim()))
            .forEach(checkbox => checkbox.checked = true);
            updateItem(cartId);
        }

        //GETTING THE VALUES WHEN USER RELOADS
        hiddenQuantity.value = parseInt(quantityInput.value);
        hiddenPrice.value = parseFloat(selectVariation.value);
        hiddenSubtotal.value = parseFloat(subtotalElement.textContent);

        let selectedLabels = "";

        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                const label = checkbox.parentElement.textContent.trim();
                selectedLabels += label + ", ";
                if (selectedLabels.endsWith(", ")) {
                    selectedLabels = selectedLabels.slice(0, -2);
                }
                hiddenAddons.value = selectedLabels;
            }
        });

        //GETTING VALUE WHEN USER INTERACTS WITH THE ITEMS
        quantityInput.addEventListener("change", () =>{
            hiddenQuantity.value = parseInt(quantityInput.value);
            hiddenSubtotal.value = parseFloat(subtotalElement.textContent);
        });

        selectVariation.addEventListener("change", () =>{
            hiddenPrice.value = parseFloat(selectVariation.value);
            hiddenSubtotal.value = parseFloat(subtotalElement.textContent);
        });

        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener("change", () => {
            if (checkbox.checked) {
                const label = checkbox.parentElement.textContent.trim();
                selectedLabels += label + ", ";

                if (selectedLabels.endsWith(", ")) {
                    selectedLabels = selectedLabels.slice(0, -2);
                }

                hiddenAddons.value = selectedLabels;
                hiddenSubtotal.value = parseFloat(subtotalElement.textContent);
            } else {
                const label = checkbox.parentElement.textContent.trim();
                selectedLabels = selectedLabels.replace(label + ", ", "");

                if (selectedLabels.endsWith(", ")) {
                    selectedLabels = selectedLabels.slice(0, -2);
                }
                
                hiddenAddons.value = selectedLabels;
                hiddenSubtotal.value = parseFloat(subtotalElement.textContent);
            }
            });
        });


        
        // Call the updateItem function on change events
        quantityInput.addEventListener('change', () => updateItem(cartId));
        selectVariation.addEventListener('change', () => updateItem(cartId));
        checkboxes.forEach(checkbox => checkbox.addEventListener('change', () => updateItem(cartId)));

        });


    </script>
</body>
</html>