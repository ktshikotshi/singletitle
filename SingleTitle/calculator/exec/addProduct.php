<?php include("../config/config.php")?>
<?php 
$productName = $_POST['productName'];
$productPrice = $_POST['productPrice'];
$productCategory = $_POST['productCategory'];

$con = mysql_connect($localhost, $database_user, $database_password);
	if(!$con){
		die('Something definitely went wrong.. You might want to look this up: '.mysql_error());
	}
	mysql_select_db($database_name, $con);
	$query = "INSERT INTO singletitle_product_list (product_name, category_id, product_status) VALUES ('$productName', $productCategory, '1')";
	if (!mysql_query($query, $con)){
		die('Something definitely went wrong.. You might want to look this up: '.mysql_error());
	}
	
	$query = "SELECT product_id FROM singletitle_product_list WHERE product_status = '1' ORDER BY product_id DESC LIMIT 1";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)){
		$productId = $row['product_id'];
	}
	
	$query = "INSERT INTO singletitle_price_list (product_id, price, price_status) VALUES ('$productId', '$productPrice', '1')";
	if (!mysql_query($query, $con)){
		die('Something definitely went wrong.. You might want to look this up: '.mysql_error());
	}
	mysql_close($con);
?>