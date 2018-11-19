<?php
use app\models\Feedback;
use app\core\Controller;
use app\core\View;

class FeedsController extends Controller
{
    function __construct()
    {
        $this->model = new Feedback();
        $this->view = new View();
    }

    public function actionIndex()
    {
        if (isset($_SESSION['name'])) {
            $data = Feedback::getFeedbacks();
            $this->view->generate('feeds.php', 'header.php', $data);
        } else {
            $this->view->generate('feeds.php', 'header.php');
        }

        return true;
    }
} 