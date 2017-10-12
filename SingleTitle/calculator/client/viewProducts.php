<style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	left:12px;
	top:90px;
	width:593px;
	height:68px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	left:611px;
	top:91px;
	width:247px;
	height:120px;
	z-index:2;
}
-->
</style>
<div id="apDiv1">
  <table width="578" border="0">
    <tr>
      <td width="51">&nbsp;</td>
      <td width="167">Product Name</td>
      <td width="145">Category</td>
      <td width="127">Price</td>
      <td width="66">&nbsp;</td>
    </tr>
    <tr>
      <td><?php
    	include("../scripts/_getAllProductsFormatted.php");
		while($row = mysql_fetch_array($result)){
			echo '<a href="../domain/viewProductPage.php?ID='.$row['price'].'"><img src="../buttons/button_home.jpg" width="71" height="17" /></a>';
			echo "<br/>";
		}
	?>
        &nbsp;</td>
      <td><?php
    	$con = mysql_connect($localhost, $database_user, $database_password);	
			if (!$con){
				die('Something definitely went wrong.. You might want to look this up: '.mysql_error());
			}
		mysql_select_db($database_name, $con);
		$result = mysql_query("SELECT singletitle_product_list.product_id, singletitle_product_list.product_name, singletitle_product_category_list.category_name,
								singletitle_product_category_list.category_price, singletitle_price_list.price 
								FROM singletitle_price_list JOIN singletitle_product_category_list JOIN singletitle_product_list
								WHERE singletitle_product_list.product_id = singletitle_price_list.product_id AND singletitle_product_list.category_id = 	             
								singletitle_product_category_list.category_id AND singletitle_product_list.product_status = '1'");
		while($row = mysql_fetch_array($result)){
			echo $row['product_name'];
			echo "<br/>";
		}
	?>
        &nbsp;</td>
      <td><?php
    	include("../scripts/_getAllProductsFormatted.php");
		while($row = mysql_fetch_array($result)){
			echo $row['category_name'];
			echo "<br/>";
		}
	?>
        &nbsp;</td>
      <td>&nbsp;</td>
      <td><?php
    	include ("../scripts/_getAllProductsFormatted.php");
		while($row = mysql_fetch_array($result)){
			echo '<a href="viewCalculator.php?ID='.$row['product_id'].'"><img src="../buttons/button_view.jpg" width="71" height="17" /></a>';
			echo "<br/>";
		}
	?>
        &nbsp;</td>
    </tr>
  </table>
</div>
<div id="apDiv2">
  <form id="form1" name="form1" method="post" action="">
    <table width="200" border="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><label>
          <input type="radio" name="radio" id="opt_SuppyFit" value="opt_SuppyFit" />
        Suppy and Fit<br />
        <input type="radio" name="radio" id="pot_Supply" value="pot_Supply" />
        Supply only<br />
        <input type="radio" name="radio" id="opt_Fit" value="opt_Fit" />
        Fit only<br />
        </label></td>
      </tr>
      <tr>
        <td><label>
          <input type="checkbox" name="category_EngineeredFloors" id="category_EngineeredFloors" />
        Engineered Floors<br />
        <input type="checkbox" name="category_SolidWoodFloors" id="category_SolidWoodFloors" />
        Solid Wood Floors<br />
        <input type="checkbox" name="category_TimberDecking" id="category_TimberDecking" />
        Timber Decking<br />
        <input type="checkbox" name="category_LaminateFloors" id="category_LaminateFloors" />
        Laminate Floors<br />
        <br />
        <input type = "image" img src="../buttons/button_plain.jpg" alt="filter" width="91" height="22" align="right" /><br />
        </label></td>
      </tr>
    </table>
  </form>
</div>
