<?php
include("../../header.php");
include("../config/config.php");
$insert = true;
if ($_GET) {
    $product=$_GET["id"];
    $insert = false;
    $con = mysql_connect($localhost, $database_user, $database_password);
    if (!$con) {
        die('Something definitely went wrong.. You might want to look this up: '.mysql_error());
    }
    mysql_select_db($database_name, $con);
    //get product
    {
        $sql="SELECT * FROM singletitle_product_list WHERE product_id={$product};";
        $product_ret = mysql_fetch_array(mysql_query($sql));
    }
    //get list of categories
    {
        $sql="SELECT category_id, category_name FROM singletitle_product_category_list";
        $categories = mysql_query($sql);
        while ($row = mysql_fetch_assoc($categories))
            $category_list[] =array($row['category_id']=>$row['category_name'],);
    }
    //get Product Price
    {
        $sql="SELECT * FROM singletitle_price_list WHERE product_id={$product};";
        $price_ret = mysql_fetch_array(mysql_query($sql));
    }
}

?>
<html>
    <head>
        <?php getStyles(); ?>
        <title><?php echo ($insert == true ?  "New Product" : "Edit product"); ?></title>
    </head>
    <body>
        <?php  getHeader();?>
        <div class="container">
            <h1><?php echo ($insert == true ?  "New Product" : "Edit product"); ?></h1>
            <div>
                <form action="" method="post">
                    <label for="product_name">Product Name:</label>
                    <input type="text" name="product_name" value='<?php echo ($insert == false ?  $product_ret['product_name'] : ""); ?>'>
                    <br/>
                    <label for="category">Product Category:</label>                    
                    <select name="category">
                        <?php 
                        if (!$inseert){
                            foreach($category_list as $val)
                                foreach($val as $key=>$c)
                                    echo "<option value='{$key}'". ($product_ret["category_id"] == $key ? "selected":"").">{$c}</option>";
                        }
                        ?>
                    </select>
                    <br/>
                    <label for="product_price">Product Price:</label>
                    <input type="text" name="product_price" value='<?php echo ($insert == false ?  $price_ret['price'] : ""); ?>'>                                        
                    <br/>
                    <?php echo ($insert?  "<button type='button' name='insert' >New Product" : ""); ?>
                    <?php echo ($insert == false ?  "<button type='button' name='edit' >Edit Product" : ""); ?>
                    <?php echo ($insert == false ?  "<button type='button' name='delete' >Delete Product" : ""); ?>  
                </form>
            </div>
        </div>
    </body>
</html>
