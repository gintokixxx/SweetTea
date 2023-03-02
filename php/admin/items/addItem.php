<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
    <link rel="stylesheet" href="../../../css/admin/adminNav.css">
    <link rel="stylesheet" href="../../../css/admin/addItem.css">

    <?php
        include "../../../classes/dbh.classes.php";
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
                <h1> Add Product </h1><br>
                <p> Make changes to your Menu effortlessly! Adjust  the product name,
                    adjust prices, update description and attach images of your products. </p><br>
            </div>

            <div class="forms">
                <form action="../../../includes/itemsubmit.php" enctype="multipart/form-data" method="post">
            
                    <div class="blocks firstBlock">
                        <div>
                            <label for="pr_name">Product Name</label> <br>
                            <input type="text" name="pr_name">
                        </div>

                        <div> 
                            <label for="pr_category">Category</label> <br>
                            <select name="pr_category">
                                <option value="Milktea" class="pr_select_options"> Milktea </option>
                                <option value="Lemonade" class="pr_select_options">Lemonade</option>
                                <option value="FruitTea" class="pr_select_options">FruitTea</option>
                                <option value="Coffee" class="pr_select_options">Coffee</option>
                                <option value="Snacks" class="pr_select_options">Snacks</option>
                            </select>
                        </div>
                    </div>

                    <div class="blocks">
                        <label for="Description">Description &nbsp; (Max 75 Characters)</label><br>
                        <input type="text" name="pr_description">
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