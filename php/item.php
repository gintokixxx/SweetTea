<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
    <link rel="stylesheet" href="../css/item.css">
</head>
<body>
    <div class="centerbox">
        <div class="whitebox">
            <div class="profile">
                <div class="logotab">
                    <img id="logo" src="../img/acclogo.png" alt="Account Profile Logo">
                </div>

                <div class="nameaddress">
                    <p>ADMIN</p>
                    <p>Email@gmail.com</p> 
                </div>

                <div class="button">
                    <a href="#" id="report" class="buttonss"> Reports</a>
                    <a href="#" id="order" class="buttonss"> Orders</a>
                    <a href="#" id="item" class="buttonss"> Items</a>
                </div>
            </div>
        </div>

        <div class="wcontents"> 
            <div class="content">
               <p id="EP">Edit Products</p><br>
               <p>Breakdown of total sales and order volume per day or per month. Use this to see whether your business is trending upwards or downwards over time.</p>
            </div>

            <div class="forms">
                <form action="">
                    <div class="block1">
                        <label id="over" for="Overview">Overview</label>
                        <button>+ADD ITEM</button>
                        <button>EDIT ITEM</button>
                    </div>
                   
                    <div class="block2">
                        <label for="Pname">Product Name</label><br>
                        <input type="text" value="" name="Productname">
                        </div>

                        <div class="block3">
                        <label for="Price">Price</label>
                        <label for="Category">Category</label>
                        <label for="Type">Types</label><br>

                        <input type="text" value="" name="Price">
                        <input type="select" value="" name="Category">
                        <input type="select" value="" name="type">
                    </div>

                    <div class="block4">
                        <label for="Description">Description</label><br>
                        <input type="text" value="" name="description">
                    </div>

                    <div class="block5">
                        <label for="ProdImage">Product Image</label>
                        <button>+Attachment</button>
                    </div>

                    <div class="block6">
                        <button>Save Product</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>