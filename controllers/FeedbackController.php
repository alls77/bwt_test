<?php

include_once ROOT.'/models/Feedback.php';

class FeedbackController
{
	public function actionIndex()
	{
		require_once(ROOT.'/views/feedback.php');

		@$name = trim($_POST['name']);
		@$email = trim($_POST['email']);
		@$message = trim($_POST['message']);

		if (isset($_POST['feedback'])) {
                        
			if (strlen($_POST['name']) >=3 && strlen($_POST['message']) >=10
                && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
				&& $this->reCaptca()) {
				
				Feedback::saveFeedback($name,$email,$message);
				echo '<h3 style="color:green;text-align:center" >Message send!</h3>';	
			} else{
				echo '<h3 style="color:red;text-align:center">Error!</h3>';
			}
		}
                
		return true;
	}
	
	
	private function reCaptca() {
		
	if (isset($_POST['g-recaptcha-response'])) {
		
	$url_to_google_api = "https://www.google.com/recaptcha/api/siteverify";
	$secret_key = '6LdqMXoUAAAAAE253ortpLY_I58Att-AejebBR8p';
	$query = $url_to_google_api.'?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR'];	
	$data = json_decode(file_get_contents($query));
	
		if ($data->success) {
		return true;
		} else {
		return false;
		}
	}
	}
}