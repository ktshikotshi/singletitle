<?php
    include("../../header.php");
    include("../scripts/_getAllProductsFormatted.php");
    $_SESSION["newProd"] = false;     
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
#afilter {
    display:inline-block;
    width:22%;
    height: 100%;
}
.prod td {
    padding:5 10px;
}
.prod tr {
    background-color: #e7e6e6;
}
.spacer {
    background-color: white !important;
    height:5px;
}
.prod {
    background-color:white;
}
</style>
<script type="text/javascript">
function filter(){

    if (!(document.getElementById("category_EngineeredFloors").checked))
    {
        var lst = document.getElementsByClassName("1");
        for(var i = 0; i < lst.length; ++i) {
             lst[i].style.display = 'none';

        }
    }
    else
    {
        var lst = document.getElementsByClassName("1");
        for(var i = 0; i < lst.length; ++i) {
             lst[i].style.display = '';
        }
    }
    if (!(document.getElementById("category_SolidWoodFloors").checked))
        {
        var lst = document.getElementsByClassName("2");
        for(var i = 0; i < lst.length; ++i) {
             lst[i].style.display = 'none';
        }
    }
    else
    {
        var lst = document.getElementsByClassName("2");
        for(var i = 0; i < lst.length; ++i) {
             lst[i].style.display = '';
        }
    }
    if (!(document.getElementById("category_TimberDecking").checked))
    {
        var lst = document.getElementsByClassName("3");
        for(var i = 0; i < lst.length; ++i) {
             lst[i].style.display = 'none';
        }
    }
    else
    {
        var lst = document.getElementsByClassName("3");
        for(var i = 0; i < lst.length; ++i) {
             lst[i].style.display = '';
        }
    }
    if (!(document.getElementById("category_LaminateFloors").checked))
        {
        var lst = document.getElementsByClassName("4");
        for(var i = 0; i < lst.length; ++i) {
             lst[i].style.display = 'none';
        }
    }
    else
    {
        var lst = document.getElementsByClassName("4");
        for(var i = 0; i < lst.length; ++i) {
             lst[i].style.display = '';
        }
    }
}
</script>
</head>
<body>
<?php getHeader(); ?>
<div id="container">
<div id="apDiv1">
  <table class="prod">
    <tr>
      <td >&nbsp;</td>
      <td><b>Product Name</td>
      <td><b>Category</td>
      <td><b>Price</td>
      <td style="background-color:#fff;">&nbsp;</td>
    </tr>
    <tr class="spacer"></tr>
    <?php
    while ($row = mysql_fetch_array($result)) {
        echo '<tr class="'.$row[category_id].'"><td><a href="../domain/viewProductPage.php?ID='.$row['price'].'"><i class="fa fa-external-link"></i></a></td>';
        echo "<td>".$row['product_name']."</td>";
        echo "<td>".$row['category_name']."</td>";
        echo "<td>".$row['price']."</td>";
        echo '<td><a href="/calculator/client/viewCalculator.php?id='.$row['product_id'].'" class="w3-btn w3-blue" style="text-decoration: none;">get quote</a>';
        echo "</td></tr>";
        echo '<tr class="spacer '.$row[category_id].'"></tr>';
    }
    ?>
  </table>
</div>

<div id="afilter">

    <table class="prod">
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr><td>
        <input type="radio" name="radio" id="opt_SuppyFit" value="opt_SuppyFit" />
        Suppy and Fit</td ></tr>
        <tr class="spacer"></tr>
        <tr><td><input type="radio" name="radio" id="pot_Supply" value="pot_Supply" />
        Supply only</td ></tr>
        <tr class="spacer"></tr>
        <tr><td><input type="radio" name="radio" id="opt_Fit" value="opt_Fit" />
        Fit only</td></tr>
        <tr class="spacer"></tr>
        <tr class="spacer"></tr>
        <tr class="spacer"></tr>
        <tr class="spacer"></tr>
        <tr><td><input type="checkbox" name="category_EngineeredFloors" id="category_EngineeredFloors" Checked />
        Engineered Floors</td></tr>
        <tr class="spacer"></tr>
        <tr><td><input type="checkbox" name="category_SolidWoodFloors" id="category_SolidWoodFloors" Checked />
        Solid Wood Floors</td ></tr>
        <tr class="spacer"></tr>
        <tr><td><input type="checkbox" name="category_TimberDecking" id="category_TimberDecking" Checked />
        Timber Decking</td ></tr>
        <tr class="spacer"></tr>
        <tr><td><input type="checkbox" name="category_LaminateFloors"  id="category_LaminateFloors" Checked />
        Laminate Floors</td ></tr>
        <tr class="spacer"><td style="text-align: right;"><input type = "button" onClick="filter();" value="Apply Filter" class="w3-btn w3-orange"/></td>
        </td>
      </tr>
    </table>

</div>
</div>

</body>
</html>
