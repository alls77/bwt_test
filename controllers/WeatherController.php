<?php

class WeatherController
{
	public function actionIndex()
	{
		require_once(ROOT.'/views/weather.php');

		return true;
	}
}