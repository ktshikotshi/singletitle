<?php
function test_input($data)
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
if(isset($_POST['submit'])):
if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
$secret = '6LdacSYUAAAAAJm_IfAlg9EsdcrhBdaQ5Ucqgw3z';
$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
$responseData = json_decode($verifyResponse);
$contact_name = !empty($_POST['contact_name'])?$_POST['contact_name']:'';
$contact_name = test_input($contact_name);
$email = !empty($_POST['email'])?$_POST['email']:'';
$email = test_input($email);
$message = !empty($_POST['message'])?$_POST['message']:'';
if (preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))://make sure the email address is valid
$email = $email;
if($responseData->success):
//contact form submission code
$to = 'YOUR WEBSITE EMAIL ADDRESS HERE';
$subject = 'Website contact form';
$htmlContent = "
<p><b>Name: </b>".$contact_name."</p>
<p><b>Email: </b>".$email."</p>
<p><b>Message: </b>".$message."</p>";
//set content-type for sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From:'.$contact_name.' <'.$email.'>' . "\r\n";
//send email
@mail($to,$subject,$htmlContent,$headers);
$succMsg = 'Thank you. Your message has been sent.';
$contact_name = '';
$email = '';
$message = '';
else:
$errMsg = 'Robot verification failed, please try again.';
endif;
else:
$errMsg = 'there is a problem with your email address';
endif;
else:
$contact_name=	$_POST['contact_name'];//re-display content if error
$email=	$_POST['email'];//re-display content if error
$message=	$_POST['message'];//re-display content if error
$errMsg = 'Please click on the reCAPTCHA "I\'m not a robot" box.';
endif;
else:
$errMsg = '';
$succMsg = '';
$contact_name = '';
$email = '';
$message = '';
endif;
?>