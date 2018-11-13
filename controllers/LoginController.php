<?php

include_once ROOT.'/models/Login.php';

class LoginController{
    
    public function actionIndex() {
        
        require_once(ROOT.'/views/login.php');

		@$name = trim($_POST['name']);
		@$surname = trim($_POST['surname']);
		@$email = trim($_POST['email']);
		@$gender = $_POST['gender'];
		@$bday = $_POST['bday'];
		
        //register
		if (isset($_POST['register'])) {
            
			if (strlen($_POST['name']) >=3 && strlen($_POST['surname']) >= 3
                && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                
                if(empty($bday)) $bday = NULL;
                if(empty($gender)) $gender = NULL;
		
				Login::signUp($name,$surname,$email,$gender,$bday);
				echo '<h3 style="color:green;text-align:center" >Registration successful!</h3>';
                
                //session_start();
                $_SESSION['name']=$_POST['name'];
                $_SESSION['surname']=$_POST['surname'];
                $_SESSION['email']=$_POST['email'];
                @setcookie('email', $_POST['email'], time()+ (86400 * 30), '/');
                
			} else {
				echo '<h3 style="color:red;text-align:center">Error!</h3>';
			}
		}
		
        //login
		if (isset($_POST['login'])) {
            
            $login = Login::signIn($email);
            
			if (!empty($login['email'])) {
                
                $_SESSION['name']=$login['name'];
                $_SESSION['surname']=$login['surname'];
                $_SESSION['email']=$login['email'];
                
                header('Location: ' . "weather", true);
                } else {
                    echo '<h3 style="color:red;text-align:center">Login incorrect!</h3>';
                    }			
		}
		
		if (isset($_POST['logout'])) {
            $_SESSION = [];
            header('Location: ' . "login", true);
		}
		
		return true;
	}
}