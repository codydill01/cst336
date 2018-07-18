<?php
    session_start();
    
    include 'dbConnection.php';
    
    $conn = getDatabaseConnection("ottermart");
    
    function getCategories($catId) 
    {
        global $conn;
    
        $sql = "SELECT catId, catName
                FROM om_category 
                ORDER BY catName";
    
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) 
        {
         echo "<option  ";
            echo ($record["catId"] == $catId)? "selected": ""; 
            echo " value='".$record["catId"] ."'>". $record['catName'] ." </option>";
        }
    }
    if (isset($_GET['updateProduct'])) 
    {
        $sql = "UPDATE om_product
                SET productName = :productName,
                    productDescription = :productDescription,
                    productImage = :productImage,
                    price = :price,
                    catId = :catId
                WHERE productId = :productId";
        
        $np = array();
        $np[":productName"] = $_GET['productName'];
        $np[":productDescription"] = $_GET['description'];
        $np[":productImage"] = $_GET['productImage'];
        $np[":price"] = $_GET['price'];
        $np[":catId"] = $_GET['catId'];
        $np[":productId"] = $_GET['productId'];
                
        $stmt = $conn->prepare($sql);
        $stmt->execute($np);
        echo "Product has been updated!";
    }
    if(isset ($_GET['productId']))
    {
        $product = getProductInfo();
    }
    
    function getProductInfo()
    {
        global $conn;
        
        $sql = "SELECT * 
                FROM om_product
                WHERE productId = ' " . $_GET['productId']. " '";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        return $record;
    }
    
    
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <title>Update Product </title>
    </head>
    <body>
        <h1 class = 'display-2'><strong> Update Product</strong> </h1>
                    <form>
                        <input type="hidden" name="productId" value= "<?=$product['productId']?>"/>
                        <strong>Product name</strong> <input type="text" class="form-control" value = "<?=$product['productName']?>" name="productName"><br>
                        <strong>Description</strong> <textarea name="description" class="form-control" cols = 50 rows = 4><?=$product['productDescription']?></textarea><br>
                        <strong>Price</strong> <input type="text"  class="form-control" name="price" value = "<?=$product['price']?>"><br>
                        <strong>Category</strong> <select name="catId" class="form-control">
                            <option>Select One</option>
                            <?php getCategories( $product['catId'] ); ?>
                        </select> <br />
                        <strong>Set Image Url</strong> <input type = "text" class="form-control" name = "productImage" value = "<?=$product['productImage']?>"><br>
                        <input type="submit" class='btn btn-primary' name="updateProduct" value="Update Product">
                    </form>
    </body>
</html>