<!-- output starts -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Token Master</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome-all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
  <link rel="stylesheet" href="css/jquery-ui.css" />
  <link rel="stylesheet" href="css/swiper.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="css/product-sans.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="login">
  <div class="container-fluid">
    <div class="row login-row">
      <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-xl-4 offset-xl-4">
        <div id="svgContainer"></div>
      </div>
      <div class="col-12">
        <div class="py-2">
          <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-4 offset-lg-4 login-wrapper" style="margin-top: 100px;">
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#login">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#signup">Sign Up</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane container pt-2 active" id="login">
                  <form class="form" method="post" action="login_process.php">
                  <div class="message" id="message" style="margin: auto;"></div>
                  <div class="form-group has-feedback">
                    <br>
                    <input type="text" name="uname" id="uname" class="form-control" placeholder="Username">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                  </div>
                  <div class="col-auto"><br>
                  <center><button type="submit" name="login" id="submit" class="btn btn-primary">Submit</button></center>
                </div>
                </form>
                      </div>
                  <div class="tab-pane container py-3" id="signup">
                      <form class="form" method="post" action="signup_process.php">
                  <div class="message" id="message" style="margin: auto;"></div>
                  <div class="form-group has-feedback">
                    <center></center><br>
                 <div class="row">
                          <div class="col-12 col-md-12">
                            <input type="email" name="uname" id="uname" class="form-control" placeholder="Email ID" required autocomplete="off">
                          </div>
                          <div class="col-12 col-md-12">
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" required autocomplete="off">
                          </div>
                          <div class="col-12 col-md-12">
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" required autocomplete="off">
                          </div>
                          <div class="col-12 col-md-12">
                            <input type="textarea" name="address" id="address" class="form-control" placeholder="Address" required autocomplete="off">
                          </div>
                          <div class="col-12 col-md-12">
                            <input type="tel" name="phoneno" id="phoneno" class="form-control" placeholder="Contact No." required autocomplete="off">
                          </div>
                          <div class="col-12 col-md-12">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required autocomplete="off">
                          </div>
                          <div class="col-12 py-3">
                            <input type="checkbox" name="tnc" required> I Accept the <a href="#" data-toggle="modal" data-target="#myModal">Terms and Conditions</a>
                          </div>
                        </div>
                       <div class="col-auto"><br>
                  <center><button type="submit" name="login" id="login" class="btn btn-primary">Submit</button></center>
                </div>
                      </form>
                  </div>
                </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-dark">Terms and Conditions</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body text-dark">
        <?php echo $terms_and_conditions; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/swiper.min.js"></script>
<script src="js/lottie.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>