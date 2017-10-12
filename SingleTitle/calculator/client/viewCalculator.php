<form id="form1" name="form1" method="post" action="">
<?php include ("../config/config.php"); ?>
<?php session_start();

if (empty($_POST['length']) && empty($_POST['width'])){
	$_SESSION['length'] = "";
	$_SESSION['width'] = "";
	echo "An empty post was sent";
} else{
	$_SESSION['length'] = $_POST['length'];
	$_SESSION['width'] = $_POST['width'];
}

$_SESSION['unitPrice']; //not really necessary
$_SESSION['length'];
$_SESSION['width'];
$_SESSION['floorID'];

	if ($_SESSION['floorID'] == "" && $_SESSION['length'] == "" && $_SESSION['width'] == "" && $_SESSION['floorID'] == ""){
		echo "dud: ".$_SESSION['unitPrice'];
	}else {
		$_SESSION['length'] = $_POST['length'];
		$_SESSION['width'] = $_POST['width'];
			if ($_SESSION['floorID'] ==""){
				$_SESSION['floorID'] = $_REQUEST['ID'];
			}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	left:282px;
	top:112px;
	width:503px;
	height:350px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	left:523px;
	top:190px;
	width:243px;
	height:151px;
	z-index:2;
}
#apDiv3 {
	position:absolute;
	left:295px;
	top:189px;
	width:217px;
	height:67px;
	z-index:3;
}
#apDiv4 {
	position:absolute;
	left:296px;
	top:265px;
	width:218px;
	height:72px;
	z-index:4;
}
#apDiv5 {
	position:absolute;
	left:420px;
	top:355px;
	width:205px;
	height:62px;
	z-index:5;
}
#apDiv6 {
	position:absolute;
	left:286px;
	top:130px;
	width:9px;
	height:1px;
	z-index:6;
}
#apDiv7 {
	position:absolute;
	left:295px;
	top:142px;
	width:4px;
	height:0px;
	z-index:6;
}
#apDiv8 {
	position:absolute;
	left:294px;
	top:141px;
	width:467px;
	height:34px;
	z-index:6;
}
-->
</style>
</head>

<body>
<div id="apDiv1">
  <label>
  
  </label>
</div>
<div id="apDiv2">
  <table width="242" height="147" border="0">
    <tr>
      <td height="24">Price</td>
    </tr>
    <tr>
      <td><label>
        <input name="finalPrice" type="text" id="finalPrice" value="<?php  if ($_SESSION['length'] == "" && $_SESSION['width'] == ""){ echo $_SESSION['unitPrice'];} else {
																		$area = ($_SESSION['length']*$_SESSION['width']); $total = $_SESSION['unitPrice']*$area;
																		$extras = $_POST['extras'];
																		echo $total + $extras;
																	 }?>" />
      </label></td>
    </tr>
  </table>
</div>
<div id="apDiv3">
  <label = "A textBox"></label>
  <table width="218" height="68" border="0">
    <tr>
        <td height="23">Dimensions</td>
    </tr>
      <tr>
        <td><table width="126" border="0">
          <tr>
            <td width="48"><label>
              <input name="length" type="text" id="length" size="8"  value="<?php  if (!$_SESSION['length'] == ""){ echo $_SESSION['length'];} ?>"/>
            </label></td>
            <td width="8">x</td>
            <td width="130"><label>
              <input name="width" type="text" id="width" size="8" value="<?php  if (!$_SESSION['width'] == ""){ echo $_SESSION['width'];} ?>"/>
            </label></td>
          </tr>
        </table></td>
      </tr>
    </table>
</div>
<div id="apDiv4">
  <table width="215" height="71" border="0">
    <tr>
      <td height="23">Extras</td>
    </tr>
    <tr>
      <td><label>
        <select name="extras" id="extras">
          <option value="0">None</option>
          <option value="350">Monocoat</option>
          <option value="550">Waterproofing</option>
        </select>
      </label></td>
    </tr>
  </table>
</div>
<div id="apDiv5">
  <table width="200" border="0">
    <tr>
      <td><div align="center"><input type = "image" img src="../buttons/button_plain.jpg" alt="calculate" width="91" height="22" /></div></td>
    </tr>
    <tr>
      <td><div align="center"><img src="../buttons/button_reset.jpg" alt="reset" width="91" height="22" align="absmiddle" /></div></td>
    </tr>
  </table>
</div>
<div id="apDiv8">
  <table width="468" border="0">
    <tr>
      <td width="334">&nbsp;</td>
      <td width="118">
      <?php
		$con = mysql_connect($localhost, $database_user, $database_password);	
			if (!$con){
				die('Something definitely went wrong.. You might want to look this up: '.mysql_error());
			}
		mysql_select_db($database_name, $con);
		$result = mysql_query("SELECT singletitle_product_list.product_name, singletitle_price_list.price FROM 
								singletitle_product_list JOIN singletitle_price_list WHERE singletitle_product_list.product_id = singletitle_price_list.product_id AND 					      							singletitle_product_list.product_id = $_REQUEST[ID]");
		while($row = mysql_fetch_array($result)){
			echo $row['product_name'];
			$_SESSION['floorID'] = $row['product_name'];
			$_SESSION['unitPrice'] = $row['price'];
			echo "<br/>";
		}
	  ?>
      </td>
    </tr>
  </table>
</div>
</form>
</body>
</html>
