<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/custom.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
<header>
  <div class="container">
      <div class="row">
           <div class="col-md-12 col-sm-12">
               <div class="img">
                   <img src="images/logo2.png" class="img-responsive" id="logoimg">
               </div>
                    <div class="signup_btn">
                      <!-- <button id="show"> --><span class="btn btn-link" id="signUp">SIGN UP</span><!-- </button> -->
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
      <img src="images/s3.jpg" class="img-responsive" id="logoimg">
    </div>
    </div>
    <div class="col-md-6 col-sm-8">
    
    <section id="sign_section">

        <div class="panel panel-primary signpanel">
            <div class="panel-heading">
                User's registration page
            </div>
            <div class="panel-body">

                <div id="result1"></div>
                <form method="post" id="myform">
                    <div class="form-group">
                        <label class="col-md-12 control-label">Name</label>
                        <div class="col-md-6 gutter-left">
                        <input type="text" autocomplete="off" name="first" id="first" class="form-control" placeholder="Enter first name">
                            <div id="firstname"></div>
                        </div>
                        <div class="col-md-6 gutter-right">
                            <input type="text" autocomplete="off" name="last" id="last" class="form-control" placeholder="Enter last name">
                            <div id="lastname"></div>
                        </div>
                    </div>


                    <div class="form-group col-md-12 gutter-left">
                        <label class="control-label">Username</label>
                            <div class="input-group">
                                <input title="suggestion" autocomplete="off" type="text"  name="username" id="username" class="form-control" placeholder="Enter username">
                                <div class="input-group-addon">@hestamail.com</div>
                            </div>
                            <div class="suggest"
                                    <ul id="list"></ul>
                            </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-12">password</label>
                        <div >
                        <input type="password" autocomplete="off" name="password" id="pas" class="form-control" placeholder="Enter password">
                            <div id="pasdiv"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Confirm password</label>
                        <div >
                        <input type="password" autocomplete="off" id="cpas" name="confirm" class="form-control" placeholder="confirm password">
                            <div id="confirmdiv"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Date of birth</label>
                        <div >
                        <input type="date" class="form-control" id="dob" name="dat" >
                        </div>
                    </div>

                    <div class="form-group">

                        <button id="attach"><span class="fa fa-file"></span> Attachment</button>
                        <span id="imgtext"></span>
                        <input type="file" id="img" name="myfile">

                    </div>
                    <div class="form-group" id="attachResult"></div>

                    <div class="form-group">
                        <label class="control-label">Phone no.</label>
                            <div class="input-group">
                                <div class="input-group-addon">+91</div>
                            <input type="text" autocomplete="off" class="form-control" id="phone" name="phone" placeholder="Enter phone number" >

                            </div>
                            <div id="phonediv"></div>

                    </div>

                    <div class="form-group">
                        <label class="control-label">Location</label>
                        <div >
                            <select name="location" id="location" class="form-control">
                                <option>select state</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Uttar pradesh">Uttar pradesh</option>
                                <option value="Rajsthan">Rajsthan</option>
                                <option value="Gujrat">Gujrat</option>
                                <option value="Tamilnadu">Tamilnadu</option>
                                <option value="keral">keral</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group policy">
                        <p>You must agree with our <a href="#"> terms and conditions</a></p>
                        <p>Already a user <a id="loginbtn">Login here</a> </p>
                    </div>
                    <div class="form-group">

                        <button type="button" id="sub" class="btn-block" name="submit">SIGN IN</button>
                    </div>
                </form>

            </div><!--end of panel body-->
        </div><!--end of panel-->

    </section>
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
                <!-- <span class="btn btn-link" id="signUp">SIGN UP</span> -->
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
