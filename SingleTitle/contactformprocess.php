<?php

if(isset($PPOST['ContactButton'])){

	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$privatekey = "6LdacSYUAAAAAJm_IfAlg9EsdcrhBdaQ5Ucqgw3z";

	$response = file_get_contents($url."?secret=".$privatekey."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);

	$data = json_decode($response);

	if(isset($data->success) AND $data->success==true){
		
		header('Location: Contact.php?CaptchaPass=True');
}else{

		header('Location: Contact.php?CaptchaFail=True');

	}
}



/* Subject & Email Variables */

$emailSubject = 'Single Tile website Message!';
$webMaster = 'sales@capetownhalalbiltong.co.za';

/* Gathering Data Variables */

$nameField = $_POST['name'];
$lastnameField = $_POST['lastname'];
$phonenumberField = $_POST['phonenumber'];
$emailField = $_POST['email'];
$messageField = $_POST['message'];

$body = <<<EOD
<br><hr><br>
Name: $nameField <br>
Last Name: $lastnameField <br>
Phone Number: $phonenumberField <br>
Email: $emailField <br>
Message: $messageField <br>
EOD;


$headers = "From: $emailField\r\n";
$headers .= "Content-type: text/html\r\n";
$success = mail($webMaster, $emailSubject, $body, $headers); 

/* results rendered as html */

$theResults = <<<EOD
<html>
<head>
<title>Single Title Investments</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script src="js/jquery.chocolat.js"></script>
		<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen" charset="utf-8" />
		<link href="css/headers2.css" rel="stylesheet" type="text/css">
		<!--light-box-files -->
		<script type="text/javascript" charset="utf-8">
		$(function() {
			$('#example1 a').Chocolat();
		});
		</script>
</head>
<body> 
<!--header-->
	<div class="header">
		<div class="header-top">
			<div class="container">
				<div class="top-nav">
					<span class="menu"> </span>
					<ul>
						<li  ><a href="index.html" class="scroll"><span data-hover="Home">Home</span></a><label> </label></li>
						<li><a href="products.html" class="scroll"> <span data-hover="Products">Products</span></a><label> </label></li>
						<li><a href="services.html" class="scroll"><span data-hover="Services">Services</span></a><label> </label></li>
						<li><a href="gallery.html" class="scroll"><span data-hover="Gallery">Gallery</span></a><label> </label></li>
						<li><a href="contact.php" class="scroll"><span data-hover="Contacts">Contacts</span></a><label> </label></li>
						<li><a href="links.html" class="scroll"><span data-hover="Links">Links</span></a></li>
					</ul>
					<!--script-->
				<script>
					$("span.menu").click(function(){
						$(".top-nav ul").slideToggle(500, function(){
						});
					});
			</script>
				</div>
				 <div class="search-box">
					    <div id="sb-search" class="sb-search">
							<form>
								<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"> </span>
							</form>
						</div>
				    </div>
					<!-- search-scripts -->
					<script src="js/classie.js"></script>
					<script src="js/uisearch.js"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
						</script>
					<!-- //search-scripts -->
			<div class="clearfix"> </div>
		</div>
		</div>
		<div class="header-bottom">
			<div class="container">
            <div id="div320header" >
              <div id="div320img" align="center"><img src="images/sti.jpg" alt=""/><img src="images/sawood.jpg" alt=""/>
            </div>
            <div class="col-sm-offset-1 col-sm-5"><div><span class="div320titleid" style="font-family: Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', monospace; font-size: 46px; color: #CF662F;"
                  >Single Title</span><br><span style="color: #CF662F">t/a Wooden Decks & Floors Plus</span></div>
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
            
            
<div class="div967">
  <div class="row">
                  <div class="col-sm-2"><img src="images/sti.jpg" alt=""/></div>
                  
                  <div class="col-sm-offset-1 col-sm-5"><div><span style="font-family: Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', monospace; font-size: 46px; color: #CF662F;"
                  >Single Title </span><br><span style="color: #CF662F">t/a Wooden Decks & Floors Plus</span></div>
                  <div>
<div class="row">
                      <div class="col-sm-1.5"><i class="phone"> </i></div>
                      <div class="col-sm-4">082 261 2932<br>
010 224 0233</div>
                      <div class="col-sm-2"><i class="phone new-phone"></i></div>
                      <div class="col-sm-4">04 Sangster Road<br>
Blue Heaven
Bryanston</div>
                    </div>
</div>
                  </div>
                  
                  <div class="col-sm-2"><img src="images/sawood.jpg" alt=""/></div>
                </div>
<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--banner-->
	<script src="js/responsiveslides.min.js"></script>
	<script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
	<div class="slider">
	    <div class="callbacks_container">
	      <ul class="rslides" id="slider">
	        <li>
	          <img src="images/banner.jpg" alt="">
	          <div class="banner">
				<h2>Massaranduba Timber<br /><span>Decking</span></h2>
				<a href="#" class="read-more">CLICK HERE</a>
			</div>
	        </li>
	        <li>
	          <img src="images/banner1.jpg" alt="">
	        	 <div class="banner">
				<h2>Oak T&G<br /><span>Flooring</span></h2>
				<a href="#" class="read-more">CLICK HERE</a>
			</div>
	        </li>
	        <li>
	          <img src="images/banner2.jpg" alt="">
	         <div class="banner">
				<h2>Zimbabwean Teak Timber<br /><span>Decking</span></h2>
				<a href="#" class="read-more">CLICK HERE</a>
			</div>
	        </li>
	        <li>
	          <img src="images/banner3.jpg" alt="">
	         <div class="banner">
				<h2>zimbabwean Teak T&G Strip<br /><span>Flooring</span></h2>
				<a href="#" class="read-more">CLICK HERE</a>
			</div>
	        </li>
	      </ul>
	  </div>
	  </div>
	<!---->
	<!--content-->
	<div class="content">
		<div class="content-welcome">
			
		</div>
		<div class="content-bottom-grid">
			<div class="container">
				<div class="content-bottom">
					<h3>your message was send</h3>
					<p><span><em>One of our consultants will be in contact with you soon.</em></span></p>


			</div>
				
				<div class="bottom-in-set">
				<a class="blub" href="#"> <span ></span></a>
				<blockquote>
				  <p>
				    �	Solid wooden floors add character to your home <br />
				    �	A wooden deck will increase usable space around swimming pools<br />
				    �	Solid wooden floors and decking increases the value of your property<br />
				    �	Solid wood /real wood is durable if used properly and can be restored to its original new look years after installation</p>
				  </blockquote>
	</p>
				<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!-- requried-jsfiles-for owl -->
							<link href="css/owl.carousel.css" rel="stylesheet">
							    <script src="js/owl.carousel.js"></script>
							        <script>
									    $(document).ready(function() {
									      $("#owl-demo").owlCarousel({
									        items : 4,
									        lazyLoad : true,
									        autoPlay : true,
									        navigation : true,
									        navigationText :  true,
									        pagination : false,
									      });
									    });
									  </script>
							 <!-- //requried-jsfiles-for owl -->

		<!-- start content_slider -->
		<div id="example1">
		<div id="owl-demo" class="owl-carousel text-center">
			<div class="item">
				<a href="images/m.jpg" title="B&W teak tongue and groove flooring " rel="by singletitle investments">
					<img class="img-responsive lot" src="images/m.jpg" alt="B&W teak tongue and groove flooring by singletitle investments">
				</a>
			</div>
			<div class="item">
				<a href="images/m1.jpg" title="Balau decking by singletitle investments" rel="">
					<img class="img-responsive lot" src="images/m1.jpg" alt="">
				</a>
			</div>
			<div class="item">
				<a href="images/m2.jpg" title="beach flooring whitewashed by single title investments" rel="title1">
					<img class="img-responsive lot" src="images/m2.jpg" alt="">
				</a>
			</div>
			<div class="item">
				<a href="images/m3.jpg" title="laminate flooring by singletitle investments" rel="title1">
					<img class="img-responsive lot" src="images/m3.jpg" alt="">
				</a>
			</div>
			
			<div class="item">
				<a href="images/m5.jpg" title="parquert block by singletitle investments cc" rel="title1">
					<img class="img-responsive lot" src="images/m5.jpg" alt="">
				</a>
			
		</div>
		</div>
		<!--//sreen-gallery-cursual---->
		<div class="content-in-on">
		<h4>Kind Words from clients</h4>
							 <!-- start content_slider -->
							 <div class="wmuSlider example2">
				   <div class="wmuSliderWrapper">
					   <article style="position: absolute; width: 100%; opacity: 0;">
							<div class=" item-in">
								<b class="down-arrow"> </b>										  
								<p><i>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500. when an unknown printer took a galley of type and scrambled it to make a type specimen book</i></p>
								<b class=" in-usa"> </b>
								<label> </label>
								<span>Mirem ipsum ,USA</span>
							</div>	
					 	</article>
						<article style="position: absolute; width: 100%; opacity: 0;">
							<div class=" item-in">
								<b class="down-arrow"> </b>										  
								<p><i>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500. when an unknown printer took a galley of type and scrambled it to make a type specimen book</i></p>
								<b class=" in-usa"> </b>
								<label> </label>
								<span>Mirem ipsum ,USA</span>
							</div>	
					 	</article>
						<article style="position: absolute; width: 100%; opacity: 0;">
							<div class=" item-in">
								<b class="down-arrow"> </b>										  
								<p><i>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500. when an unknown printer took a galley of type and scrambled it to make a type specimen book</i></p>
								<b class=" in-usa"> </b>
								<label> </label>
								<span>Mirem ipsum ,USA</span>
							</div>	
					 	</article>
					 	
					 </div>
	                <ul class="wmuSliderPagination">
	                	<li><a href="#" class="">0</a></li>
	                	<li><a href="#" class="">1</a></li>
	                	<li><a href="#" class="">2</a></li>
	                </ul>
	            </div>
	            <script src="js/jquery.wmuSlider.js"></script> 
				  <script>
	       			$('.example2').wmuSlider();         
	   		     </script> 	           	         

							 <!---->
						     
			</div>
	</div>
	<!--footer-->
	<div class="footer">
		<div class="container">
		<div class="footer-top">
			<div class="col-md-3 footer-in">
			<h5>Newsletter</h5>
			</div>
			<div class="col-md-6 mail">
				<input type="text" value="ENTER EMAIL" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='ENTER EMAIL';}">
			</div>
			<div class="col-md-3 send">
				<input type="submit" value="SUBSCRIBE" >
			</div>
			<div class="clearfix"> </div>
		</div>
			<div class="foter-bottom">
					<ul class="social-ic-icons">
						<li class="facebook"><a href="https://www.facebook.com/www.singletitle.co.za/"><span> </span></a></li>
						<li class="twitter"><a href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Fwww.singletitle.co.za%2F&amp;ref_src=twsrc%5Etfw&amp;text=Wooden%20Floors%2C%20Decks%20%26%20Patio%20Suppliers%20Gauteng%20-%20Flooring%20Solution&amp;tw_p=tweetbutton&amp;url=http%3A%2F%2Fwww.singletitle.co.za%2F&amp;via=decksnfloors"><span> </span></a></li>
						<li class="gmail"><a href="https://plus.google.com/u/0/115799296241015145770"><span> </span></a></li>
						<li class="instagram"><a href="https://www.instagram.com/woodendecksnfloorsplus/?hl=en"><span> </span></a></li>
					</ul>
				 <p class="footer-grid"><a href="solidwoodenfloors.html">Solid Wooden Floors </a>&#160; &#160;
                 <a href="woodendecks.html"> Wooden Decks </a>&#160; &#160;
                 <a href="parquetfloor.html"> Parquet Flooring </a>&#160; &#160;<br>
                 <a href="solidwoodprefinishedfloors.html"> Solid Wood Pre-Finished Floors </a>&#160; &#160;
                 <a href="engineeredfloors.html"> Engineered Floors </a>&#160; &#160;
                 <a href="laminatedfloors.html"> Laminated Floors </a>&#160; &#160;

              <br>Designed by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
			</div>
		</div>
	</div>
</body>
</html>
EOD;

echo "$theResults";









?>