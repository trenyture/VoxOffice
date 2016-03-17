<?php
	session_start();
	if(isset($_POST)){
		$from=$_POST['mail'];	
		$message=$_POST['message']."\n -- \n".$_SESSION['fbName'];	
		$subject=$_POST['sujet'];
		if(mail( 'simon.trichereau@gmail.com', $subject, $message, "From: ".$from."\nReply-to: ".$from."\n" )){
			header('location:../../contact.php?send=true');
		}else{
			echo "Il y a eu un problème lors de l'envoi, veuillez retenter.";
			header( "Refresh:5; url=../../contact", true, 303);
		}
	}else{
		header('location:../../index');
	}
?>