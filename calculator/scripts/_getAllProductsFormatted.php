<?php
	include ("../config/config.php");
	$con = mysql_connect($localhost, $database_user, $database_password);	
			if (!$con){
				die('Something definitely went wrong.. You might want to look this up: '.mysql_error());
			}
		mysql_select_db($database_name, $con);
		$result = mysql_query("SELECT singletitle_product_list.product_id, singletitle_product_list.product_name, singletitle_product_category_list.category_id, singletitle_product_category_list.category_name,
								singletitle_product_category_list.category_price, singletitle_price_list.price 
								FROM singletitle_price_list JOIN singletitle_product_category_list JOIN singletitle_product_list
								WHERE singletitle_product_list.product_id = singletitle_price_list.product_id AND singletitle_product_list.category_id = 	             
								singletitle_product_category_list.category_id AND singletitle_product_list.product_status = '1'");
?>