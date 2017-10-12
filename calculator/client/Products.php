<?php
include("../scripts/_getAllProductsFormatted.php");
include("../../header.php");

$con = mysql_connect($localhost, $database_user, $database_password);	
if (!$con){
    die('Something definitely went wrong.. You might want to look this up: '.mysql_error());
}
mysql_select_db($database_name, $con);

?>
<head><?php getStyles(); ?></head>
<body>
<?php getHeader(); ?>
<div id="content">
    <div class="left">
    <table>
        <tr>
            <th><th>
            <th>Product Name<th>
            <th>Description<th>
            <th>Price<th>
            <th><th>
        </tr>
</table>
</div>
</div>
</body>