<?php include("config/config.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="740" border="0" cellpadding="1">
  <tr>
    <td width="143">Product Name</td>
    <td width="162">Category</td>
    <td width="135">Fitment Price</td>
    <td width="105">Price</td>
    <td width="75">&nbsp;</td>
    <td width="94">&nbsp;</td>
  </tr>
  <tr>
    <td>
	<?php 
		/*
		$con = mysql_connect($localhost, $database_user, $database_password);	
			if (!$con){
				die('Something definitely went wrong.. You might want to look this up: '.mysql_error());
			}
		mysql_select_db($database_name, $con);
		$result = mysql_query("SELECT singletitle_product_list.product_name, singletitle_product_category_list.category_name,
								singletitle_product_category_list.category_price, singletitle_price_list.price 
								FROM singletitle_price_list JOIN singletitle_product_category_list JOIN singletitle_product_list
								WHERE singletitle_product_list.product_id = singletitle_price_list.product_id AND singletitle_product_list.category_id = singletitle_product_category_list.category_id AND 						                                singletitle_product_list.product_status = '1'");*/
		include ("scripts/_getAllProductsFormatted.php");
		while($row = mysql_fetch_array($result)){
			echo $row['product_name'];
			echo "<br/>";
		}
		//mysql_close;
	?>
    &nbsp;</td>
    <td>
    <?php
    	include("scripts/_getAllProductsFormatted.php");
		while($row = mysql_fetch_array($result)){
			echo $row['category_name'];
			echo "<br/>";
		}
	?>
    &nbsp;</td>
    <td>
    <?php
    	include("scripts/_getAllProductsFormatted.php");
		while($row = mysql_fetch_array($result)){
			echo $row['category_price'];
			echo "<br/>";
		}
	?>
    &nbsp;</td>
    <td>
    <?php
    	include ("scripts/_getAllProductsFormatted.php");
		while($row = mysql_fetch_array($result)){
			echo $row['price'];
			echo "<br/>";
		}
	?>
    &nbsp;</td>
    <td>
    <?php
    	include ("scripts/_getAllProductsFormatted.php");
		while($row = mysql_fetch_array($result)){
			echo '<a href="link/link.php?ID='.$row['price'].'"><img src="buttons/button_edit.jpg" width="71" height="17" /></a>';
			echo "<br/>";
		}
	?>
    &nbsp;</td>
    <td><?php
    	include ("scripts/_getAllProductsFormatted.php");
		while($row = mysql_fetch_array($result)){
			echo '<a href="link/link.php?ID='.$row['price'].'"><img src="buttons/button_view.jpg" width="71" height="17" /></a>';
			echo "<br/>";
		}
		
	?>
    &nbsp;</td>
  </tr>
</table>
</body>
</html>

