<link href="/template/css/style.css" rel="stylesheet" type="text/css" media="screen" />
<h3 style="color:#00008B;text-align:center" >Messages:</h3><br>

<?php 
foreach ($feedbacks as $feedback):?>

<div class="container">
 <div class="row">
 <div class="col-md-offset-3 col-md-6">
 <div class="form-horizontal">
              <div class="form-group">
                <p><?= $feedback['name']; ?></p>
                <p><?= "<strong>email:</strong> ".$feedback['email']; ?></p>
                <textarea class="feed" readonly><?= $feedback['message']; ?></textarea>
              </div>
 </div>
 </div>
</div>
</div>
<br><br>

<?php endforeach;?>