<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link rel="stylesheet" href="../../../css/admin/adminNav.css">
    <link rel="stylesheet" href="../../../css/admin/addItem.css">

    <?php
        include "../../../classes/dbh.classes.php";

        $updateId = $_GET['updateid'];
        $select = mysqli_query($conn, "SELECT * FROM items WHERE pr_id=$updateId") or die("Query Failed");
        $row = mysqli_fetch_assoc($select);

        $id = $row['pr_id'];
        $name = $row['pr_name'];
        $option = $row['pr_category'];
        $description = $row['pr_description'];
    ?>

</head>
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
                <a href="../contactus.php" id="item" class="buttonss"> Reviews</a>
                <a href="../logout.php" id="item" class="buttonss"> Log Out </a>
            </div>
        </div>

        <div class="wcontents"> 

            <div class="content">
                <h1> Update Product </h1><br>
                <p> Make changes to your Menu effortlessly! Adjust  the product name,
                    adjust prices, update description and attach images of your products. </p><br>
            </div>

            <div class="forms">
                <form action="../../../includes/updateitem.php" enctype="multipart/form-data" method="post">
            
                    <div class="blocks firstBlock">
                        <div>
                            <label for="pr_name">Product Name</label> <br>
                            <input type="text" name="pr_name" value="<?php echo $name?>">
                            <input type="hidden" name="pr_id" value="<?php echo $id?>">
                        </div>

                        <div> 
                            <label for="pr_category">Category</label> <br>
                            <select name="pr_category">
                                <option value="Milktea" class="pr_select_options" <?php if ($option == 'Milktea') { echo ' selected'; } ?>> Milktea </option>
                                <option value="Lemonade" class="pr_select_options" <?php if ($option == 'Lemonade') { echo ' selected'; } ?>>Lemonade</option>
                                <option value="FruitTea" class="pr_select_options" <?php if ($option == 'FruitTea') { echo ' selected'; } ?>>FruitTea</option>
                                <option value="Coffee" class="pr_select_options" <?php if ($option == 'Coffee') { echo ' selected'; } ?>>Coffee</option>
                                <option value="Snacks" class="pr_select_options" <?php if ($option == 'Snacks') { echo ' selected'; } ?>>Snacks</option>
                            </select>
                        </div>
                    </div>

                    <div class="blocks">
                        <label for="Description">Description &nbsp; (Max 75 Characters)</label><br>
                        <input type="text" name="pr_description" value="<?php echo $description?>">
                    </div>

                    <div class="blocks">
                        <label>Product Image</label><br>
                        <input type="file" name="pr_image" id="pr_image">
                    </div>

                    <div class="blocks">
                        <input type="submit" name="submit">
                    </div>
                    
                </form>
            </div>
        </div>


    </div>
</body>
</html>