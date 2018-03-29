<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/front_hdr.css">

</head>
<body>
<header>
  <div class="container">
      <div class="row">
           <div class="col-md-12 col-sm-12">
               <div class="img">
                   <img src="img/logo2.png" class="img-responsive" id="logoimg">
               </div>
                    <div class="signup_btn">
                      <button id="show">SIGN_UP</button>
                            <a href="#" class="account"></a>
                    </div>
           </div>
      </div>
  </div>
  <div class="backimg" >
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-4">
      <div class="item">
      <img src="img/s3.jpg" class="img-responsive" id="logoimg">
    </div>
    </div>
    <div class="col-md-6 col-sm-8">
          <div class="loginContainer ">
    <div class="panel panel-primary mypanel ">
        <div class="panel-heading heading">
            Login to HestaMail
        </div>
        <div class="panel-body">
            <div id="loginmsg"></div>
            <form method="post">
                <div class="form-group">
                    <label class="control-label">Email/Username</label>
                    <input type="text" id="email" required class="form-control" name="email" placeholder="Enter Email or Username">
                </div>

                <div class="form-group">
                    <label class="control-label">Password</label>
                    <input type="password" id="pas1" required class="form-control" name="password" placeholder="Enter password">
                </div>
                <button type="button" id="login1" name="login1" class="btn btn-success">Login</button>
                <span class="btn btn-link" id="signUp">SIGN UP</span>
            </form>
            </div>
            </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </header>
</body>
</html>
