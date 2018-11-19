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
        @$name = trim($_POST['name']);
        @$surname = trim($_POST['surname']);
        @$email = trim($_POST['email']);
        @$gender = $_POST['gender'];
        @$bday = $_POST['bday'];
        $data = [];

        //register
        if (isset($_POST['register'])) {

            if ($this->validate($data)) {

                if (empty($bday)) $bday = NULL;
                if (empty($gender)) $gender = NULL;

                $sign = Login::signUp($name, $surname, $email, $gender, $bday);
                ($sign == null) ? $data[] = 'Registration successful!' : $data[]=$sign;

                @setcookie('email', $_POST['email'], time() + (86400 * 30), '/');
            }
        }

        //login
        if (isset($_POST['login'])) {

            $login = Login::signIn($email);

            if (!empty($login['email'])) {

                $_SESSION['name'] = $login['name'];
                $_SESSION['surname'] = $login['surname'];
                $_SESSION['email'] = $login['email'];

                header('Location: ' . "login", true);
            } else {
                $data[] ='Login incorrect!';
            }
        }

        $this->view->generate('login.php', 'header.php', $data);
        return true;
    }

    public function actionLogout()
    {
        $_SESSION = [];
        header('Location: ' . "login", true);
    }

    private function validate(&$data) {
        if (strlen($_POST['name']) < 3) {
            $data[]= 'Name is at least 3 characters long';
        }
        elseif (strlen($_POST['surname']) < 3) {
            $data[]= 'Surname is at least 3 characters long';
        }
        elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $data[]= 'Email incorrect!';
        }
        else {
            return true;
        }
    }
}