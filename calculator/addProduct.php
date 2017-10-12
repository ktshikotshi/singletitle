<?php include("config/config.php"); ?>
<form action="exec/addProduct.php" method="post">
  <table width="478" height="25" border="0">
    <tr>
      <td><label>
        <input type="text" name="productName" id="productName" />
      </label></td>
      <td><label>
        <input type="text" name="productPrice" id="productPrice" />
      </label></td>
      <td><label>
        <?php
		$con = mysql_connect($localhost, $database_user, $database_password);
		if (!$con){
			die('Something definitely went wrong.. You might want to look this up: '.mysql_error());
		}
		mysql_select_db($database_name, $con);
		$query = ("SELECT category_id, category_name FROM singletitle_product_category_list WHERE category_status = '1'");
		$result = mysql_query($query);
		
		echo "<select name = productCategory value= ''>Product Category</option>";
			while ($nt = mysql_fetch_array($result)){
				echo "<option value = $nt[category_id]>$nt[category_name]</option>";
			}
		echo "</select>";
		?>
      </label></td>
      <td><input type = "image" img src="buttons/button_add.jpg" alt="btn_add" width="91" height="22" /></td>
      <td><a href="#"><img src="buttons/button_reset.jpg" alt="btn_reset" width="91" height="22" /></a></td>
    </tr>
  </table>
</form>