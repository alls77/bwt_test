<?php

class WeatherController
{
    public function actionIndex()
    {
        if (isset($_SESSION['name'])) {

            require_once(ROOT . '/views/weather.php');
        } else {
            echo '<h3 style="color:red;text-align:center">For registered users only!</h3>';
        }

        return true;
    }
}