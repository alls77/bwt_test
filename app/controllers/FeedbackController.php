<?php
use app\models\Feedback;
use app\core\Controller;
use app\core\View;

class FeedbackController extends Controller
{
    function __construct()
    {
        $this->model = new Feedback();
        $this->view = new View();
    }

    public function actionIndex()
    {
        @$name = trim($_POST['name']);
        @$email = trim($_POST['email']);
        @$message = trim($_POST['message']);
        $data = [];

        if (isset($_POST['feedback'])) {

            if ($this->validate($data)) {

                //Feedback::saveFeedback($name, $email, $message);
                $this->model->saveFeedback($name, $email, $message);
                $data[]= 'Message send!';
            }
        }

        $this->view->generate('feedback.php', 'header.php', $data);
        return true;
    }

    private function validate(&$errors) {
        if (strlen($_POST['name']) < 3) {
            $errors[]= 'Name is at least 3 characters long';
        }
        elseif (strlen($_POST['message']) < 10) {
            $errors[]= 'Message is at least 10 characters long';
        }
        elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errors[]= 'Email incorrect!';
        }
        elseif($this->reCaptca()==false) {
            $errors[]= 'Captca incorrect!';
        }
        else {
            return true;
        }
    }


    private function reCaptca()
    {

        if (isset($_POST['g-recaptcha-response'])) {

            $url_to_google_api = "https://www.google.com/recaptcha/api/siteverify";
            $secret_key = '6LdqMXoUAAAAAE253ortpLY_I58Att-AejebBR8p';
            $query = $url_to_google_api . '?secret=' . $secret_key . '&response=' . $_POST['g-recaptcha-response'] . '&remoteip=' . $_SERVER['REMOTE_ADDR'];
            $data = json_decode(file_get_contents($query));

            return ($data->success) ? true : false;
        }
    }
}  