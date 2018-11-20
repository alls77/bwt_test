<script src="/template/js/feedback.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>

<?php
if(isset($data)):
foreach ($data as $d):?>
    <p><h3 style="color:green;text-align:center" ><?= $d; ?></h3></p>
<?php endforeach;
endif;?>

<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="tab" role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a aria-controls="home" role="tab"
                                                              data-toggle="tab">feedback</a></li>
                </ul>
                <div class="tab-content tabs">
                    <div role="tabpanel" class="tab-pane fade in active">
                        <form class="form-horizontal" action="saveFeedback" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                       value="<?= $_SESSION['name'] ?? ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                       value="<?= $_SESSION['email'] ?? ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Message</label><br>
                                <textarea name="message" class="form-control-ta" id="message" required></textarea>
                            </div>
                            <div class="form-group" id="messageShow2"></div>
                            <div class="g-recaptcha" data-sitekey="6LdqMXoUAAAAAEXNaP2sLB_SAIED-jZcSymUGc8n"></div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default btn-c" name="feedback" id="done2">Send
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>