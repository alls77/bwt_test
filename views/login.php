<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<link href="/template/css/style.css" rel="stylesheet" type="text/css" media="screen" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/template/js/main.js"></script>

<div class="container">
 <div class="row">
 <div class="col-md-offset-3 col-md-6">

 <div class="tab" role="tabpanel">
 <!-- Nav tabs -->
 <ul class="nav nav-tabs" role="tablist">
 <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">sign in</a></li>
 <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">sign up</a></li>
 </ul>
 <!-- Tab panes -->
 <div class="tab-content tabs">
 <div role="tabpanel" class="tab-pane fade in active" id="Section1">

 <form class="form-horizontal" action="<?=$_SERVER['SCRIPT_NAME'];?>" method="post">

 <div class="form-group">
 <label for="exampleInputPassword1">Email</label>
 <input type="email" class="form-control" name="email" id="email" value="<?=$_COOKIE['email'] ?? '' ?>" required>
 </div>

 <div class="form-group">
 <button type="submit" class="btn btn-default" name="login">Sign in</button>
 </div>
 </form>
 </div>
 
 <div role="tabpanel" class="tab-pane fade" id="Section2">
    
 <form class="form-horizontal" action="<?=$_SERVER['SCRIPT_NAME'];?>" method="post">
 <div class="form-group">
 <label for="exampleInputEmail1">Name</label>
 <input type="text" class="form-control" name="name" id="name" required>
 </div>
 <div class="form-group">
 <label for="exampleInputEmail1">Surname</label>
 <input type="text" class="form-control" name="surname" id="surname" required>
 </div>
 <div class="form-group">
 <label for="exampleInputEmail1">Email</label>
 <input type="email" class="form-control" name="email" id="email" required>
 </div>
 <div class="form-group">
 <label for="exampleInputPassword1">Gender</label>
 <select name="gender" class="form-control" name="gender" id="gender">
 <option value="">-</option>
 <option value="male">male</option>
 <option value="female">female</option>
 </select>
 </div>        
 <div class="form-group">
 <label for="exampleInputEmail1">Bithday</label>
 <input type="date" class="form-control" name="bday" id="exampleInputEmail1" value="null">
 </div>
 <div class="form-group" id="messageShow2"></div>
 <div class="form-group">
 <button type="submit" class="btn btn-default" name="register" id="done">Sign up</button>
 </div>
 </form>
 </div>
 </div>
 </div>

</div><!-- /.col-md-offset-3 col-md-6 -->
</div><!-- /.row -->
</div><!-- /.container -->