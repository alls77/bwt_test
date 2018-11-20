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
        $this->view->generate('feedback.php', 'header.php');
    }

    public function actionSaveFeedback()
    {
        @$name = trim($_POST['name']);
        @$email = trim($_POST['email']);
        @$message = trim($_POST['message']);
        $data = [];

        if ($this->validate($name, $email, $message, $data)) {

            $this->model->saveFeedback($name, $email, $message);
            $data[] = 'Message send!';
        }

        $this->view->generate('feedback.php', 'header.php', $data);
    }

    public function actionListFeedback()
    {
        if (isset($_SESSION['name'])) {
            $data = $this->model->getFeedbacks();
            $this->view->generate('feeds.php', 'header.php', $data);
        } else {
            $this->view->generate('feeds.php', 'header.php');
        }
    }


    private function validate($name, $email, $message, &$data)
    {
        if (strlen($name) < 3) {
            $data[] = 'Name is at least 3 characters long';
        } elseif (strlen($message) < 10) {
            $data[] = 'Message is at least 10 characters long';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $data[] = 'Email incorrect!';
        } elseif ($this->reCaptca() == false) {
            $data[] = 'Captca incorrect!';
        } else {
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