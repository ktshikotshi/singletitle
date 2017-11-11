<!DOCTYPE html>
<form id="form1" name="form1" method="post" action="">
    <?php include ("../config/config.php"); ?>
    <?php include ("../../header.php"); ?>
    <?php session_start();
     $_SESSION["newProd"] = false;
     if (isset($_GET["id"])){   
        $con = mysql_connect($localhost, $database_user, $database_password);
        if (!$con) {
            die('Something definitely went wrong.. You might want to look this up: '.mysql_error());
        }
        mysql_select_db($database_name, $con);
        $product = $_GET["id"];
        //get product
        {
            $sql="SELECT * FROM singletitle_product_list WHERE product_id={$product};";
            $product_ret = mysql_fetch_array(mysql_query($sql));
        }
        //get price
        {
            $sql="SELECT * FROM singletitle_price_list WHERE product_id={$product};";
            $price_ret = mysql_fetch_array(mysql_query($sql));
            if (empty($price_ret))
            {
                header("location : /calculator/client/viewProducts.php");
                exit();
            }
            else
            {    
                if (strcmp($_GET["price"], "pot_Supply") == 0)
                    $unitPrice = $price_ret["Supply_onlyPrice"];
                else if (strcmp($_GET["price"], "opt_Fit") == 0)
                    $unitPrice = $price_ret["Install_onlyPrice"];
                else
                $unitPrice = $price_ret["inclucivePrice"];

            }
        }
    }
    $posted = false;
    if (isset($_POST["submit"])){
        $width = $_POST["width"];
        $length = $_POST["length"];
        $extra = $_POST["extras"];
        $posted = true;
        //calculate area;
        $area = $width * $length;
        $totalPrice = ($area * $unitPrice) + $extra;
    }
    $reset = false;
    if (isset($_POST["reset"]))
        $reset = true;
?>
    <html lang="en" xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <title>Calculate</title>
        <?php getStyles(); ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="Reports/reportAssets/bootstrap.min.css">
        <style type="text/css">
            #container {
                width: 603px;
                height: 350px;
                background-color: #000;
                position: absolute;
                left: 0;
                right: 0;
                margin: auto;
            }

            #content {
                display: inline-block;
                width: 580px;
                height: 330px;
                border-radius: 2%;
                background-color: orange;
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                overflow: hidden;
            }

            #instQoute {
                display: inline-block;
                width: 25%;
                color: #000;
                margin-left: 5px;
                font-weight: bold;
                margin-top: 5px;
                padding-left: 5px;
                padding-top: 5px;
                text-align: center;
                border-radius: 5%;
                height: 34px;
                background-color: white;
            }

            #producContainer {
                display: inline-block;
                width: 70%;
                text-align: center;
                color: white;
            }

            #innerContent {
                width: 100%;
                top: -50px;
                padding-top: 10px;
                height: 88%;
                background-color: white;
            }

            .IO {
                display: inline-block;
                position: relative;
                width: 45%;
                height: 50%;
                left: 4%;
            }
            .lft{
                top: -30px;
            }
            .price{
                border: solid 1px #000;
            }
            .center {
                width: 80%;
                height: 50px;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
            }

            #bt {
                width: 80%;
                margin: auto;
            }
            .calcbtn{
                color: #fff !important;
                width: 260px;
                border-radius: 10px;
                margin-bottom: 15px;
            }
            .resetbtn{
                color: #fff !important;
                width: 150px;
                border-radius: 10px;
            }
            input{
                width: 100px;
            }
            #extras
            {
                width: 80%;
            }
        </style>
    </head>

    <body>
        <?php getHeader(); ?>

        <h1 style="text-align:center;clear:both;">Quote Calculator</h1>
        <div id="container">
            <div id="content">
                <div id="instQoute">Instant Quote</div>
                <div id="producContainer">
                    <p id="pruductName">
                        <?php echo $product_ret["product_name"] ?>
                    </p>
                </div>
                <div id="innerContent">
                    <div class="IO lft">
                        <table width="218" height="68" border="0">
                            <tr>
                                <td height="23">Dimensions</td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="126" border="0">
                                        <tr>
                                            <td width="48">
                                                <label>
                                                <input name="length" type="text" id="length" size="8" value="<?php echo $posted == true ? $length : 1;?>" />
                                            </label>
                                            </td>
                                            <td width="8">x</td>
                                            <td width="130">
                                                <label>
                                                <input name="width" type="text" id="width" size="8" value="<?php echo $posted == true ? $width : 1;?>"/>
                                            </label>
                                            </td>
                                            <td width="8">m</td>                                            
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <table width="215" height="71" border="0">
                            <tr>
                                Extras<br>
                                <select name="extras" id="extras">
                                    <option value="0">None</option>
                                    <option value="350">Monocoat</option>
                                    <option value="550">Waterproofing</option>
                                </select>
                            </tr>
                        </table>
                    </div>
                    <div class="IO">
                        <table width="242" height="147" border="0">
                            <tr>
                                <td height="24">Price</td>
                            </tr>
                            <tr class="price">
                                <td>
                                    <label style="font-size:35px;">
                                        <?php
                                        if ($posted == true)
                                            echo $reset == false? "R ".$totalPrice : "";
                                        ?>
                                    </label>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div id="buttons">
                        <table id="bt">
                            <tr>
                                <td>
                                <center><button type="submit" name="submit" class="w3-button w3-orange calcbtn"><i class="fa fa-calculator">&nbsp;&nbsp;</i>Calculate</button></center>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="center-block" style="width: 100%;">
                                <a href="viewProducts.php" class="w3-button w3-red resetbtn">Back to products</a> <a href="" class="w3-button w3-white resetbtn"></a><button type="submit" name="reset" class="w3-button w3-green resetbtn">Reset</button>                                    
                                </div>
                                </td>
                            </tr>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
