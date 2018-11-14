<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">

            <?php

            use GuzzleHttp\Psr7\Request;
            use PHPHtmlParser\Dom;

            date_default_timezone_set('Europe/Kiev');
            echo "<h3 style='color:#00008B;text-align:center'>Weather in Zaporizhia: " . date('d.m.Y') . "</h3><br>";

            $client = new GuzzleHttp\Client();

            $headers = ['User-Agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0'];
            $uri = 'http://www.gismeteo.ua/city/daily/5093/';
            $request = new Request('GET', $uri, $headers);
            $response = $client->send($request, ['timeout' => 4]);

            $body = $response->getBody();
            $content = $body->getContents();

            $dom = new Dom;
            $dom->load($content);

            echo $dom->find('div[id=weather-daily]')->find('div[class=wsection wdata]')->find("table");
            ?>
        </div>
    </div>
</div>