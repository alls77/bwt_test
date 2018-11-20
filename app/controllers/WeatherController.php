<?php
use app\core\Controller;
use app\models\Weather;
use app\core\View;

class WeatherController extends Controller
{

    function __construct()
    {
        $this->model = new Weather();
        $this->view = new View();
    }

    function actionIndex()
    {
        if (isset($_SESSION['name'])) {
            $data = $this->model->getWeather();
            $this->view->generate('weather.php', 'header.php', $data);
        } else {
            $this->view->generate('weather.php', 'header.php');
        }
    }
}