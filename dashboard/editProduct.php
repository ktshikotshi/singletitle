<?php
include("../header.php");
include("../calculator/config/config.php");
$insert = true;

$con = mysql_connect($localhost, $database_user, $database_password);
if (!$con) {
    die('Something definitely went wrong.. You might want to look this up: '.mysql_error());
}
mysql_select_db($database_name, $con);

//get list of categories
{
    $sql="SELECT category_id, category_name FROM singletitle_product_category_list";
    $categories = mysql_query($sql);
    while ($row = mysql_fetch_assoc($categories)) {
        $category_list[] =array($row['category_id']=>$row['category_name'],);
    }
}

if ($_GET) {
    $product=$_GET["id"];
    $insert = false;
    //get product
    {
        $sql="SELECT * FROM singletitle_product_list WHERE product_id={$product};";
        $product_ret = mysql_fetch_array(mysql_query($sql));
    }
    //get Product Price
    {
        $sql="SELECT * FROM singletitle_price_list WHERE product_id={$product};";
        $price_ret = mysql_fetch_array(mysql_query($sql));
    }
}
//perform this if the delete button is clicked
if (isset($_POST["delete"])) {
    $sql = "DELETE FROM singletitle_product_list WHERE product_id={$product};";
    $retval = mysql_query($sql);
    if (! $retval) {
        die('Could not delete data: ' . mysql_error());
    } else {
        $sql = "DELETE FROM singletitle_price_list WHERE product_id={$product};";
        $retval = mysql_query($sql);
        if (! $retval) {
            die('Could not delete data: ' . mysql_error());
        } else {
            //if deletation was successful, return to the table page.
            echo "Deleted data successfully\n";
            header("Location: /dashboard/");
        }
    }
}
//perform this if the edit button is clicked
if (isset($_POST["edit"])) {
    $sql = "UPDATE singletitle_product_list SET product_name='{$_POST["product_name"]}', category_id={$_POST["category"]} WHERE product_id={$product};";
    $retval = mysql_query($sql);
    if (! $retval) {
        die('Could not add data: ' . mysql_error());
    } else {
        $sql = "UPDATE singletitle_price_list SET inclucivePrice={$_POST["all_price"]}, Supply_onlyPrice={$_POST["sup_price"]}, Install_onlyPrice={$_POST["inst_price"]} WHERE product_id={$product};";
        $retval = mysql_query($sql);
        if (! $retval) {
            die('Could not add data: ' . mysql_error());
        } else {
            //if update was successful, return to the table page.
            echo "Updated data successfully\n";
            header("Location: /dashboard/");
        }
    }
}
//perfom this when the insert button is clicked
if (isset($_POST["insert"])) {
    $sql = "INSERT INTO singletitle_product_list (product_name, category_id, product_status) VALUES ('{$_POST["product_name"]}', {$_POST["category"]}, 1);";
    $retval = mysql_query($sql);
    if (! $retval) {
        die('Could not update data: ' . mysql_error());
    } else {
        $id = mysql_insert_id();
        $sql = "INSERT INTO singletitle_price_list (product_id, inclucivePrice, Supply_onlyPrice, Install_onlyPrice, price_status) VALUES ({$id}, {$_POST["all_price"]}, {$_POST["sup_price"]}, {$_POST["inst_price"]}, 1);";
        $retval = mysql_query($sql);
        if (! $retval) {
            die('Could not update data: ' . mysql_error());
        } else {
            //if update was successful, return to the table page.
            echo "Updated data successfully\n";
            header("Location: http://localhost/calculator/client/dash.php");
        }
    }
}

?>
<html>
    <head>
        <?php getStyles(); ?>
        <title><?php echo ($insert == true ?  "New Product" : "Edit product"); ?></title>
        <style>
            .container{
                width: 80%;
                margin: auto;
            }
            h1{
                text-align: center;
            }
            .form{
                width: 80%;
                margin: auto;
                padding: 60px;
                background-color:#e7e6e6
            }
            input[type=text], select
            {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

            input[type=submit] {
                width: 100%;
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            #delete{
                background-color: red;                
            }
            input[type=submit]:hover {
                background-color: #45a049;
            }
            #delete:hover {
                background-color: #c55555;
            }

        </style>
    </head>
    <body>
        <?php  getHeader();?>
        <div class="container">
            <h1><?php echo ($insert == true ?  "New Product" : "Edit product"); ?></h1>
            <div class="form">
                <form action="" method="post">
                    <label for="product_name">Product Name:</label>
                    <input type="text" name="product_name" value='<?php echo ($insert == false ?  $product_ret['product_name'] : ""); ?>'>
                    <br/>
                    <label for="category">Product Category:</label>                    
                    <select name="category">
                        <?php
                        foreach ($category_list as $val) {
                            foreach ($val as $key => $c) {
                                if (!$insert) {
                                    echo "<option value='{$key}'". ($product_ret["category_id"] == $key ? "selected":"").">{$c}</option>";
                                } else {
                                    echo "<option value='{$key}'>{$c}</option>";
                                }
                            }
                        }
                        ?>
                    </select>
                    <br/>
                    <label for="product_price">All inclusive Price:</label>
                    <input type="text" name="all_price" value='<?php echo ($insert == false ?  $price_ret['inclucivePrice'] : ""); ?>'>
                    <label for="product_price">Supply only Price:</label>
                    <input type="text" name="sup_price" value='<?php echo ($insert == false ?  $price_ret['Supply_onlyPrice'] : ""); ?>'>  
                    <label for="product_price">Install only Price:</label>
                    <input type="text" name="inst_price" value='<?php echo ($insert == false ?  $price_ret['Install_onlyPrice'] : ""); ?>'>                                          
                    <br/>
                    <?php echo ($insert?  "<input type='submit' name='insert' value='New Product'>" : ""); ?>
                    <?php echo ($insert == false ?  "<input type='submit' name='edit' value='Edit Product'>" : ""); ?>
                    <?php echo ($insert == false ?  "<input type='submit' name='delete' id='delete' value='Delete Product'>" : ""); ?>  
                </form>
            </div>
        </div>
    </body>
</html>
