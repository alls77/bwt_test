<?php

use app\models\Login;
use app\core\Controller;
use app\core\View;

class LoginController extends Controller
{
    function __construct()
    {
        $this->model = new Login();
        $this->view = new View();
    }

    public function actionIndex()
    {
        $this->view->generate('login.php', 'header.php');
    }

    public function actionRegister()
    {
        @$name = trim($_POST['name']);
        @$surname = trim($_POST['surname']);
        @$email = trim($_POST['email']);
        @$gender = $_POST['gender'];
        @$bday = $_POST['bday'];
        $data = [];

        if ($this->validate($name,$surname,$email,$data)) {

            if (empty($bday)) $bday = NULL;
            if (empty($gender)) $gender = NULL;

            $sign = $this->model->signUp($name, $surname, $email, $gender, $bday);
            ($sign == null) ? $data[] = 'Registration successful!' : $data[] = $sign;

            @setcookie('email', $_POST['email'], time() + (86400 * 30), '/');
        }

        $this->view->generate('login.php', 'header.php', $data);
    }

    public function actionSignin()
    {
        @$email = trim($_POST['email']);
        $data = [];

        $login = $this->model->signIn($email);

        if (!empty($login['email'])) {

            $_SESSION['name'] = $login['name'];
            $_SESSION['surname'] = $login['surname'];
            $_SESSION['email'] = $login['email'];

            header('Location: ' . "login", true);
        } else {
            $data[] = 'Login incorrect!';
        }

        $this->view->generate('login.php', 'header.php', $data);
    }

    public function actionLogout()
    {
        $_SESSION = [];
        header('Location: ' . "login", true);
    }

    private function validate($name,$surname,$email,&$data)
    {
        if (strlen($name) < 3) {
            $data[] = 'Name is at least 3 characters long';
        } elseif (strlen($surname) < 3) {
            $data[] = 'Surname is at least 3 characters long';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $data[] = 'Email incorrect!';
        } else {
            return true;
        }
    }
}