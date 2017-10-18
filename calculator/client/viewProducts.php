<?php
	include("../../header.php");
    include("../scripts/_getAllProductsFormatted.php");
?>
<html>
<head>
<?php getStyles(); ?>
<style type="text/css">
#container{
	width: 80%;
	margin: auto;
}
#apDiv1 {
	display:inline-block;
	width:75%;
	height: 100%;
}
#filter {
	display:inline-block;
	width:22%;
	height: 100%;
}
</style>
</head>
<body>
<?php getHeader(); ?>
<div id="container">
<div id="apDiv1">
  <table >
    <tr>
      <td >&nbsp;</td>
      <td>Product Name</td>
      <td>Category</td>
      <td>Price</td>
      <td>&nbsp;</td>
    </tr>
	<?php
		while($row = mysql_fetch_array($result)){
			echo '<tr><td><a href="../domain/viewProductPage.php?ID='.$row['price'].'"><img src="../buttons/button_home.jpg" width="71" height="17" /></a></td>';
			echo "<td>".$row['product_name']."</td>";
			echo "<td>".$row['category_name']."</td>";
			echo '<td><a href="viewCalculator.php?ID='.$row['product_id'].'"><img src="../buttons/button_view.jpg" width="71" height="17" /></a>';

			echo "</td></tr>";
		}
	?>
  </table>
</div>

<div id="filter">
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
</div>
</body>
</html>