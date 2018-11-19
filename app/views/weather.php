<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">

            <?php
            if ($data == null):?>
                <h3 style="color:red;text-align:center">For registered users only!</h3>
            <?php else:
                date_default_timezone_set('Europe/Kiev');
                echo "<h3 style='color:#00008B;text-align:center'>Weather in Zaporizhia: " . date('d.m.Y') . "</h3><br>";

                echo $data;
            endif;?>
        </div>
    </div>
</div>