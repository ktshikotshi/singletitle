<?php
if(isset($_POST['submit'])):
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
		//your site secret key
        $secret = '6LdacSYUAAAAAJm_IfAlg9EsdcrhBdaQ5Ucqgw3z';
		//get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
		
		$name = !empty($_POST['name'])?$_POST['name']:'';
		$telno = !empty($_POST['telno'])?$_POST['telno']:'';
		$email = !empty($_POST['email'])?$_POST['email']:'';
		$message = !empty($_POST['message'])?$_POST['message']:'';
        if($responseData->success):
			//contact form submission code
			$to = 'info@singletitle.co.za';
			$subject = 'New contact form have been submitted';
			$htmlContent = "
				<h1>Contact request details</h1>
				<p><b>Name: </b>".$name."</p>
				<p><b>Tel No: </b>".$telno."</p>
				<p><b>Email: </b>".$email."</p>
				<p><b>Message: </b>".$message."</p>
			";
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// More headers
			$headers .= 'From:'.$name.' <'.$email.'>' . "\r\n";
			//send email
			@mail($to,$subject,$htmlContent,$headers);
			
            $succMsg = 'Your message was send. We will be in contact with you soon.';
			$name = '';
			$telno = '';
			$email = '';
			$message = '';
        else:
            $errMsg = 'Robot verification failed, please try again.';
        endif;
    else:
        $errMsg = 'Please click on the reCAPTCHA box.';
    endif;
else:
    $errMsg = '';
    $succMsg = '';
	$name = '';
	$telno = '';
	$email = '';
	$message = '';
endif;
?>
<html>
<head>
<title>Contact Single Title Investments cc</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
		<link href="css/headers2.css" rel="stylesheet" type="text/css">

<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
 <script src="https://www.google.com/recaptcha/api.js" async defer></script>
       <link href="css/googlestyles.css" rel='stylesheet' type='text/css' />
<!--//fonts-->
</head>
<body> 
<!--header-->
	<div class="header">
		<div class="header-top">
			<ul class="topnav" id="myTopnav">
  <li><a href="index.html">Home</a></li>
  <li><a href="ourproducts.html">Products</a>
  </li> <li><a href="gallery.html">Gallery</a>
  </li>
  <li><a href="ourservices.html">Services</a></li>
  <li><a href="contact.php">Contact Us</a></li>
  <li><a href="links.html">Links</a></li><li><a href="/dashboard">Dashboard</a></li>
  <li class="icon">
    <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
  </li>
</ul>
		</div>
		<div class="header-bottom">
			<div class="container">
            <div id="div320header" >
            
            <div>
            <img class="logo" src="images/sti.jpg" alt="" />
            <div class="col-sm-offset-1 col-sm-5"><div><span class="div320titleid" style="font-family: 'Arial Black',Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', monospace; font-size: 20px; color: #CF662F;"
                  >Single Title Investments cc</span><br><span style="color: #CF662F;font-family: 'Arial Black';font-size: 15px;">t/a Wooden Decks & Flooring Plus</span></div>
            
            <img class="logo"  src="images/sawood.jpg" alt=""/>
            </div>
             
            
                  <div>
<div class="row">
                      <div class="col-sm-1.5"><i class="phone"> </i></div>
                      <div class="col-sm-4">082 261 2932<br>
010 224 0233</div>
                      <div class="col-sm-2"><i class="phone new-phone"></i></div>
                      <div class="col-sm-4">04 Sangster Road<br>
Blue Heaven,
Bryanston</div>
                    </div>
</div>
                  </div>
            
            </div>
            
        <div align="center">
        
        
        <div class="div769-966" align='center'>
  <table id="Table_01" width="770" height="205" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="12">
			<img src="images/singletitle-banner_01.gif" width="769" height="5" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="5" alt=""></td>
	</tr>
	<tr>
		<td rowspan="7">
			<img src="images/singletitle-banner_02.gif" width="22" height="199" alt=""></td>
		<td rowspan="6">
			<img src="images/singletitle-banner_03.gif" width="161" height="181" alt=""></td>
		<td colspan="2">
			<img src="images/singletitle-banner_04.gif" width="57" height="74" alt=""></td>
		<td colspan="4" align="center" valign="bottom"><span style="font-family: 'Arial Black',Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', monospace; font-size: 30px; color: #CF662F;"
                  >Single Title Investments cc </span> </td>
		<td colspan="2">
			<img src="images/singletitle-banner_06.gif" width="56" height="74" alt=""></td>
		<td rowspan="5">
			<img src="images/singletitle-banner_07.png" width="158" height="154" alt=""></td>
		<td rowspan="7">
			<img src="images/singletitle-banner_08.gif" width="19" height="199" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="74" alt=""></td>
	</tr>
	<tr>
		<td rowspan="6">
			<img src="images/singletitle-banner_09.gif" width="1" height="125" alt=""></td>
		<td colspan="7" align="center" valign="top"><br><span style="color: #CF662F; font-family: 'Arial Black','Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font-size: 22px;">t/a Wooden Decks & Flooring Plus</span></td>
		<td>
			<img src="images/spacer.gif" width="1" height="28" alt=""></td>
	</tr>
	<tr>
		<td colspan="7">
			<img src="images/singletitle-banner_11.gif" width="408" height="5" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="5" alt=""></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="4">
			<img src="images/singletitle-banner_12.gif" width="85" height="92" alt=""></td>
		<td>
			082 261 2932<br>
010 224 0233</td>
		<td rowspan="4">
			<img src="images/singletitle-banner_14.gif" width="46" height="92" alt=""></td>
		<td colspan="2" rowspan="3"  valign="top">
			04 Sangster Road<br>
Blue Heaven <br>Bryanston<br></td>
		<td rowspan="4">
			<img src="images/singletitle-banner_16.gif" width="22" height="92" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="43" alt=""></td>
	</tr>
	<tr>
		<td rowspan="3">
			<img src="images/singletitle-banner_17.gif" width="103" height="49" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="4" alt=""></td>
	</tr>
	<tr>
		<td rowspan="2">
			<img src="images/singletitle-banner_18.gif" width="158" height="45" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="27" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/singletitle-banner_19.gif" width="161" height="18" alt=""></td>
		<td colspan="2">
			<img src="images/singletitle-banner_20.gif" width="152" height="18" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="18" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/spacer.gif" width="22" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="161" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="56" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="29" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="103" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="46" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="118" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="34" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="22" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="158" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="19" height="1" alt=""></td>
		<td></td>
	</tr>
</table>
			</div>
        
        
        
        
        
        <div class="div967" align='center'>
  <table id="Table_01" width="968" height="258" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="11">
			<img src="images/singletitle-banner-967_01.gif" width="967" height="6" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="6" alt=""></td>
	</tr>
	<tr>
		<td rowspan="7">
			<img src="images/singletitle-banner-967_02.gif" width="27" height="251" alt=""></td>
		<td rowspan="6">
			<img src="images/singletitle-banner-967_03.gif" width="204" height="229" alt=""></td>
		<td>
			<img src="images/singletitle-banner-967_04.gif" width="70" height="93" alt=""></td>
		<td colspan="4" align="center"><span style="font-family: 'Arial Black',Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', monospace; font-size: 30px; color: #CF662F;"
                  >Single Title Investments cc </span></td>
		<td colspan="2">
			<img src="images/singletitle-banner-967_06.gif" width="69" height="93" alt=""></td>
		<td rowspan="5">
			<img src="images/singletitle-banner-967_07.png" width="200" height="195" alt=""></td>
		<td rowspan="7">
			<img src="images/singletitle-banner-967_08.gif" width="23" height="251" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="93" alt=""></td>
	</tr>
	<tr>
		<td colspan="7" align="center"        >
			<span style="color: #CF662F; font-family: 'Arial Black','Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font-size: 24px;">t/a Wooden Decks & Flooring Plus</span></td>
		<td>
			<img src="images/spacer.gif" width="1" height="36" alt=""></td>
	</tr>
	<tr>
		<td colspan="7">
			<img src="images/singletitle-banner-967_10.gif" width="513" height="6" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="6" alt=""></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="4">
			<img src="images/singletitle-banner-967_11.gif" width="107" height="116" alt=""></td>
		<td>
			082 261 2932<br>
010 224 0233</td>
		<td rowspan="4">
			<img src="images/singletitle-banner-967_13.gif" width="57" height="116" alt=""></td>
		<td colspan="2" rowspan="3" valign="top">
			04 Sangster Road<br>
Blue Heaven<br> Bryanston</td>
		<td rowspan="4">
			<img src="images/singletitle-banner-967_15.gif" width="27" height="116" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="55" alt=""></td>
	</tr>
	<tr>
		<td rowspan="3">
			<img src="images/singletitle-banner-967_16.gif" width="130" height="61" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="5" alt=""></td>
	</tr>
	<tr>
		<td rowspan="2">
			<img src="images/singletitle-banner-967_17.gif" width="200" height="56" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="34" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/singletitle-banner-967_18.gif" width="204" height="22" alt=""></td>
		<td colspan="2">
			<img src="images/singletitle-banner-967_19.gif" width="192" height="22" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="22" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/spacer.gif" width="27" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="204" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="70" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="37" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="130" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="57" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="150" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="42" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="27" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="200" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="23" height="1" alt=""></td>
		<td></td>
	</tr>
</table>
			</div>
        </div>    

		</div>
	</div>
	
	<!--content-->
	<div class="content">
	<div class="contact">
		<div class="container">	
			<div class="contact-top">		
				<h3>contact</h3>
				<p>Suppliers, Installers & Renovators of all Solid Wooden floors and Decking - <br>
			    04 Sangster Road<br>
			    Blue Heaven<br>
			    Bryanston</p>
				<p>Nearest corner Main road and Witkoppen <br>
				  next to Engen Garage on Main Road
                    <br>
                  Tel: 082 261 2932
                  <br>
                  Tel: 010 224 0233
                  <br>
                  Fax: 086 604 7391
                  <br>
                  <a href="mailto:singletitle@gmail.com ">singletitle@gmail.com </a><br>
                  <a href="mailto:pasi@singletitle.co.za">pasi@singletitle.co.za</a></p>
			</div>
			<div class="map-content">
			<div class="col-md-6 map">
			<h4>OUR LOCATION</h4>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3585.022583804919!2d28.023122715026613!3d-26.03281708351449!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e9573fc263c5f75%3A0xd02635dd1e40ae9f!2s4+Sangster+Rd%2C+Sandton%2C+2191!5e0!3m2!1sen!2sza!4v1487918974171"></iframe>
			</div>
				<div class="col-md-6 contact-grid">
					<h4>CONTACT FORM</h4>
					 <?php if(!empty($errMsg)): ?><div class="errMsg"><?php echo $errMsg; ?></div><?php endif; ?>
        <?php if(!empty($succMsg)): ?><div class="succMsg"><?php echo $succMsg; ?></div><?php endif; ?>
		<div class="form-info">
			<form action="" method="POST">
				<input type="text" class="text" value="<?php echo !empty($name)?$name:''; ?>" placeholder="Your full name" name="name" >
                <input type="text" class="text" value="<?php echo !empty($telno)?$telno:''; ?>" placeholder="Your Contact No." name="telno" >
                <input type="text" class="text" value="<?php echo !empty($email)?$email:''; ?>" placeholder="Email adress" name="email" >
                <textarea type="text" placeholder="Message..." required name="message"><?php echo !empty($message)?$message:''; ?></textarea>
				<div class="g-recaptcha" data-sitekey="6LdacSYUAAAAABdyqJrzKnhfLMhoy9Pd6xLfDsqX"></div>
				<input type="submit" name="submit" value="SUBMIT">
			</form>
				</div>
			</div>
		</div>
		</div>	
	</div>
	<!--footer-->
	<div class="footer">
		<div class="container">
		
			<div class="foter-bottom">
					<ul class="social-ic-icons">
						<li class="facebook"><a href="https://www.facebook.com/www.singletitle.co.za/"><span> </span></a></li>
						<li class="twitter"><a href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Fwww.singletitle.co.za%2F&amp;ref_src=twsrc%5Etfw&amp;text=Wooden%20Floors%2C%20Decks%20%26%20Patio%20Suppliers%20Gauteng%20-%20Flooring%20Solution&amp;tw_p=tweetbutton&amp;url=http%3A%2F%2Fwww.singletitle.co.za%2F&amp;via=decksnfloors"><span> </span></a></li>
						<li class="gmail"><a href="https://plus.google.com/u/0/115799296241015145770"><span> </span></a></li>
						<li class="instagram"><a href="https://www.instagram.com/woodendecksnfloorsplus/?hl=en"><span> </span></a></li>
					</ul>
				 <p class="footer-grid"><a href="index.html">Home </a>&#160; &#160; <a href="ourproducts.html"> Products </a>&#160; &#160;
                 <a href="ourservices.html"> Services </a>&#160; &#160;<br><a href="gallery.html">Gallery </a>&#160; &#160;
                 <a href="contact.php"> Contacts </a>&#160; &#160;
                 <a href="links.html"> Links </a>&#160; &#160;<br><a href="solidwoodtandgflooring.html">Solid Wood T & G Flooring</a>&#160; &#160;
                 <a href="timberdeckingandcompositedecking.html">Timber Decking & Composite Decking</a>&#160; &#160;
                 <a href="woodparquetflooring.html">Wood Parquet Flooring</a>&#160; &#160;<br>
                 <a href="BambooDeckingandFlooring.html">Bamboo Decking and Flooring</a>&#160; &#160;
                 <a href="engineeredfloors.html"> Engineered Floors </a>&#160; &#160;
                 <a href="LaminateFlooringandVinylFlooring.html">Laminate Flooring and Vinyl Flooring</a>&#160; &#160;

               <br>Designed by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
			</div>
		</div>
	</div>
</body>
</html>