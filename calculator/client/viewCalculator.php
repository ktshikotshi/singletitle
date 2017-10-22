<!DOCTYPE html>
<form id="form1" name="form1" method="post" action="">
<?php include ("../config/config.php"); ?>
<?php include ("../../header.php"); ?>
<?php session_start();

if (empty($_POST['length']) && empty($_POST['width'])) {
    $_SESSION['length'] = "";
    $_SESSION['width'] = "";
    echo "An empty post was sent";
} else {
    $_SESSION['length'] = $_POST['length'];
    $_SESSION['width'] = $_POST['width'];
}

$_SESSION['unitPrice']; //not really necessary
$_SESSION['length'];
$_SESSION['width'];
$_SESSION['floorID'];

if ($_SESSION['floorID'] == "" && $_SESSION['length'] == "" && $_SESSION['width'] == "" && $_SESSION['floorID'] == "") {
    echo "dud: ".$_SESSION['unitPrice'];
} else {
    $_SESSION['length'] = $_POST['length'];
    $_SESSION['width'] = $_POST['width'];
    if ($_SESSION['floorID'] =="") {
        $_SESSION['floorID'] = $_REQUEST['ID'];
    }
}
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Calculate</title>
    <?php getStyles(); ?>
    <style type="text/css">
    html{
        font-family: "Arial";
        font-weight: bold;
    }
        #container {
            width: 603px;
            height: 350px;
            background-color: #000;
            position: absolute;
            top: 250px;
            bottom: 0;
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
            overflow:hidden;
        }
        #instQoute {
            display: inline-block;
            width: 25%;
            color: #000;
            margin-left: 5px;
            margin-top:5px;
            padding-left: 5px;
            padding-top: 15px;
            text-align:center;
            border-radius: 5%;
            height:34px;
            background-color: white;
        }
        #producContainer{
            display:inline-block;
            width:70%;
            text-align:center;
            color:white;
        }
        #innerContent {
            width: 100%;
            top: -50px;
            padding-top: 10px;
            height: 85%;
            background-color: white;
        }
        .IO{
            display: inline-block;
            position:relative;
            width: 45%;
            height: 50%;
            left: 4%;
            margin: auto;
            border: solid black 1px;
        }
        #buttons {
            display: inline-block;
            position: relative;
            left: 4%;
            width: 91%;
            height: 50%;
        }
        .button {
    background-color: orange;
    border: none;
    color: white;
    border-radius: 5%;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    height:40px;
    width:200px;
}
.center{
    width: 80%;
            height: 50px;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
}
#bt{
    width:80%;
    margin: auto;
}
    </style>
</head>
<body>
<?php getHeader(); ?>
    <div id="container">
        <div id="content">
            <div id="instQoute">Instant Quote</div>
            <div id="producContainer">
                <p id="pruductName">TEST</p>
            </div>
            <div id="innerContent">
                <div class="IO">
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
                                                <input name="length" type="text" id="length" size="8" value="<?php  if (!$_SESSION['length'] == " ") {
                                                    echo $_SESSION['length'];
} ?>" />
                                            </label>
                                        </td>
                                        <td width="8">x</td>
                                        <td width="130">
                                            <label>
                                                <input name="width" type="text" id="width" size="8" value="<?php  if (!$_SESSION['width'] == " ") {
                                                    echo $_SESSION['width'];
} ?>" />
                                            </label>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table width="215" height="71" border="0">
                        <tr>
                            <td height="23">Extras</td>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <select name="extras" id="extras">
                                        <option value="0">None</option>
                                        <option value="350">Monocoat</option>
                                        <option value="550">Waterproofing</option>
                                    </select>
                                </label>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="IO">
                <table width="242" height="147" border="0">
    <tr>
      <td height="24">Price</td>
    </tr>
    <tr>
      <td><label style="font-size:35px;">
        <?php  if ($_SESSION['length'] == "" && $_SESSION['width'] == "") {
            echo $_SESSION['unitPrice'];
} else {
                                                                        $area = ($_SESSION['length']*$_SESSION['width']);
    $total = $_SESSION['unitPrice']*$area;
                                                                        $extras = $_POST['extras'];
                                                                        echo $total + $extras;
}?>
      </label></td>
    </tr>
  </table></div>
                <div id="buttons">
                <table id="bt">
    <tr>
      <td><center><input type = "image"  alt="Calculate" width="91" height="22" class="button"/></center></td>
    </tr>
    <tr>
      <td><center><input type="image" src="../buttons/button_reset.jpg" alt="reset" width="91" height="22" align="absmiddle" /></center></td>
    </tr>
  </table>
                </div>
            </div>
        </div>
        </div>
</body>
</html>
