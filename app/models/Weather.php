<?php
namespace app\models;
use app\core\Model;
use GuzzleHttp\Psr7\Request;
use PHPHtmlParser\Dom;
use GuzzleHttp\Client;

class Weather extends Model
{
    public function getWeather(){
        $client = new Client();

        $headers = ['User-Agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0'];
        $uri = 'http://www.gismeteo.ua/city/daily/5093/';
        $request = new Request('GET', $uri, $headers);
        $response = $client->send($request, ['timeout' => 4]);

        $body = $response->getBody();
        $content = $body->getContents();

        $dom = new Dom;
        $dom->load($content);

        return $dom->find('div[id=weather-daily]')->find('div[class=wsection wdata]')->find("table");
    }
}