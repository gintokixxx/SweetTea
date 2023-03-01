<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Variation</title>
    <link rel="stylesheet" href="../../../css/admin/variation.css">
    <link rel="stylesheet" href="../../../css/admin/addItem.css">
    <link rel="stylesheet" href="../../../css/admin/adminNav.css">
</head>

<?php
    include "../../../classes/dbh.classes.php";

    $variationId = $_GET['variationid'];
    $select = mysqli_query($conn, "SELECT * FROM items WHERE pr_id=$variationId") or die("Query Failed");
    $row = mysqli_fetch_assoc($select);

    $name = $row['pr_name'];
?>


<body>

    <div class="whitebox">
        <div class="profile">
            <div class="nameaddress">
                <p>ADMIN</p>
            </div>
        </div>

        <div>
            <a href="../reports.php" id="report" class="buttonss"> Reports</a>
            <a href="../orders.php" id="order" class="buttonss"> Orders</a>
            <a href="../itemlist.php" id="item" class="buttonss"> Items</a>
            <a href="../logout.php" id="item" class="buttonss"> Log Out </a>
        </div>
    </div>

    <div class="wcontents"> 

        <div class="content">
            <h1> Add a Variation</h1><br>
            <p> Add a variation for your Products. Remember that the lowest priced variation will be the one that will be showed in the menu. </p><br>
        </div>

        <div class="forms">

            <form action="../../../includes/variation.inc.php" method="post" id="form">

                <!-- GET THE PRODUCT NAME FOR ADDING VARIATION -->
                <label for="product">Product Name</label><br>
                <input type="text" name="product" value="<?php echo $name?>" disabled>
                <input type="hidden" name="productName" value="<?php echo $name?>" >
                
                
                <div id="variantContainer">
                    <input type="text" name="variantName[]" placeholder="Variant Name" required>
                    <input type="text" name="variantPrice[]" placeholder="Variant Price" required>
                </div>
                
                <button id="addVariantButton" onclick="addVariant()" type="button">Add Variant</button>  

                <input type="submit" name="submit">

            </form>

        </div>

    </div>

    <script>

        function addVariant() {

        // Select the existing form element
        var myForm = document.querySelector('#variantContainer');

        // Create and add a new form input element
        var inputvarName = document.createElement('input');
        inputvarName.setAttribute('type', 'text');
        inputvarName.setAttribute('name', 'variantName[]');
        inputvarName.setAttribute('placeholder', 'Variant Name');

        myForm.appendChild(inputvarName);

        var inputvarPrice = document.createElement('input');
        inputvarPrice.setAttribute('type', 'text');
        inputvarPrice.setAttribute('name', 'variantPrice[]');
        inputvarPrice.setAttribute('placeholder', 'Variant Price');

        myForm.appendChild(inputvarPrice);  

        }
        
    </script>
</body>
</html>