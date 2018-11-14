<?php
include_once ROOT . '/models/Feeds.php';

class FeedsController
{
    public function actionIndex()
    {
        if (isset($_SESSION['name'])) {
            $feedbacks = Feedbacks::getFeedbacks();
            require_once(ROOT . '/views/feeds.php');
        } else {
            echo '<h3 style="color:red;text-align:center">For registered users only!</h3>';
        }

        return true;
    }
} 