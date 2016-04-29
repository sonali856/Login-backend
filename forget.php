<?php
 require "init.php";
 include "library.php"; // include the library file
 include "classes/class.phpmailer.php"; // include the class name
 
 $email = $_GET['email_id'];
 
 $response=array('success'=>0,'error'=>null);
 
 if($email)
 {

		 
 if($email=='' ){
     $response['error']='please fill all values';
	
	 }
	 else{

	 $query = "SELECT * FROM users WHERE username='$username' OR email_id='$email'";
	 $check = mysqli_fetch_array(mysqli_query($conn,$query));
	 
	 
		 if(!$check){
	     $response['error']='username or email does not exist';
		 
		 }
		 else{ 
		    $active = md5($email);
			$mail	= new PHPMailer; // call the class 
			$mail->IsSMTP(); 
			$mail->Host = SMTP_HOST; //Hostname of the mail server
			$mail->SMTPDebug = 1;
			$mail->Port = SMTP_PORT; //Port of the SMTP like to be 25, 80, 465 or 587
			$mail->SMTPSecure = 'ssl';
			$mail->SMTPAuth = true; //Whether to use SMTP authentication
			$mail->Username = SMTP_UNAME; //Username for SMTP authentication any valid email created in your domain
			$mail->Password = SMTP_PWORD; //Password for SMTP authentication
			$mail->AddReplyTo("sonali.856@gmail.com", "CYKLO"); //reply-to address
			$mail->SetFrom("sonali.856@gmail.com", "CYKLO"); //From address of the mail
			// put your while loop here like below,
			$mail->Subject = "CYKLO Activation Mail"; //Subject od your mail
			$mail->AddAddress($email, "Name"); //To address who will receive this email
			$mail->MsgHTML("<b><font style='color:#009933;'> <a href='http://192.168.1.104:8080/cyklo/forgetweb.php?email=$email'> Click Here to change password </a></font><br/><br/> CYKLO <BR> Thank You.</B>");
			$send = $mail->Send(); //Send the mails
			if($send)
			{
					
							
							 $response['success'] = 1;
			}				 
			else				 $response['success'] = 0;
							
							 
							 
		 }
		 
	 mysqli_close($conn);
	 } 
    }
	else
	{ 
      $response['success'] = 0;
	  
	}
	echo(json_encode($response));
 
?>