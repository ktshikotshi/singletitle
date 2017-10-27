<?php
include("dbConfig.php");
include("header.php");

$msg = "";
if (isset($_GET['modif'])) {
	if ($_GET['modif'] == 1){
		$update = true;
	}
	
}
else
	$update = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {	
	$name = $_POST["name"];
	if ($_POST['password'] == $_POST['rpassword']){
    $password = md5($_POST["password"]);
		 
		if ($_SESSION['user'] != 'admin' && $update == false)
			$sql ="INSERT INTO members (name, password) VALUES ('{$name}', '{$password}');" ; 
		else
			$sql ="UPDATE members SET password='{$password}' WHERE name='{$name}';" ; 		
		$query = mysql_query($sql);

        if ($query === false) {
            echo "Could not successfully run query ($sql) from DB: " . mysql_error();
            exit;
        }
		$sql = "SELECT * FROM members WHERE name = '$name' AND password = '$password'";
        $query = mysql_query($sql);
        if (mysql_num_rows($query) > 0) {
            header('Location: /login.php');
            exit;
        }

		$msg = "Username and password do not match";
	}
	$msg = "passwords do not match";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>discussdesk.com - Login form in PHP mysql</title>
<meta name="description" content=""/>
<meta name="keywords" content=""/>
<link href="style.css" rel="stylesheet" type="text/css">
<?php getStyles(); ?>
</head>
<body>
<?php getHeader(); ?>
<h1 style="text-align:center;"><?php echo ($_SESSION['user'] == 'admin' && $update == true) ? "Update Password" : "Register New User" ; ?></h1>	
<form name="frmregister"action="<?= $_SERVER['PHP_SELF'] ?>" method="post" >
		<table class="form" border="0">

			<tr>
			<td></td>
				<td style="color:red;">
				<?php echo $msg; ?></td>
			</tr> 
			
			<tr>
				<th><label for="name"><strong>Name:</strong></label></th>
				<td><input class="inp-text" name="name" id="name" type="text" size="30" placeholder='User name' required/></td>
			</tr>
			<tr>
				<th><label for="name"><strong>Password:</strong></label></th>
				<td><input class="inp-text" name="password" id="password" type="password"  pattern="^\S{6,}$" size="30" placeholder='Password' required/></td>
			</tr>
			<tr>
				<th><label for="name"><strong>Retype Password:</strong></label></th>
				<td><input class="inp-text" name="rpassword" id="rpassword" type="password" size="30" pattern="^\S{6,}$" placeholder='Varify Password'  required/></td>
			</tr>
			<tr>
			<td></td>
				<td class="submit-button-right">
		
				<input type="submit" value="<?php echo $_SESSION['user'] != 'admin' && $update == false ? "Register" : "Update"; ?>" alt="Submit"  class="w3-btn w3-blue" title="Submit" />
				
				<input type="reset" value="Reset" alt="Reset"  class="w3-btn w3-red" title="Reset" /></td>
				
			</tr>
		</table>
	</form>
</body>
</html>
