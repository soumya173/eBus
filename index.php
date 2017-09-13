<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <!-- Required stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- Required scripts -->
    <script src="js/jquery.min.js" charset="utf-8"></script>
    <script src="js/bootstrap.min.js" charset="utf-8"></script>

  </head>
  <body>
    <!-- Including the connection -->
    <?php include('connect.php'); ?>

    <!-- Navbar -->
    <nav class="navbar navbar-inverse site-header">
     <div class="container-fluid">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#topNavbar">
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="index.php">eBus</a>
       </div>
       <div class="collapse navbar-collapse" id="topNavbar">
         <ul class="nav navbar-nav">
           <li class="active"><a href="index.php">Home</a></li>
           <li><a href="#">Page 1</a></li>
           <li><a href="#">Page 2</a></li>
           <li><a href="#">Page 3</a></li>
         </ul>

         <?php

            if (isset($_SESSION['passenger_id'])) {
              echo('
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Log out</a></li>
                </ul>
              ');
            } else {
              echo('
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#" data-toggle="modal" data-target="#signUpModal"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                  <li><a href="#" data-toggle="modal" data-target="#logInModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
              ');
            }

         ?>

         <!-- Modals -->
          <div id="signUpModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-md">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Sign Up</h4>
                </div>
                <div class="modal-body">
                  <form method="post" action="" class="form-horizontal">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="email" class="form-control" name="semail" placeholder="Enter email" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="password" class="form-control" name="spassword" placeholder="Enter Password" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="fname" placeholder="First Name" required>
                      </div>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="mname" placeholder="Middle Name">
                      </div>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="lname" placeholder="Last Name" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="number" class="form-control" name="mobile" placeholder="Enter Mobile Number" maxlength="10" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-2 col-sm-offset-5">
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" name="signup" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div> <!-- /modal-content -->
            </div>
          </div> <!-- /signup modal -->

          <div id="logInModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-sm">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Log In</h4>
                </div>
                <form method="post" action="">
                  <div class="modal-body">
                    <div class="form-group">
                      <input type="email" class="form-control" name="lemail" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="lpassword" placeholder="Enter Password" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Log In</button>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </form>
              </div> <!-- /modal-content -->
            </div>
          </div> <!-- /login modal -->

       </div>
     </div>
    </nav> <!-- /navbar -->


    <?php
    // Login section
    if (isset($_POST['login'])) {
      if (!empty($_POST['lemail']) && !empty($_POST['lpassword'])) {
        $email = $_POST['lemail'];
        $password = $_POST['lpassword'];

        $query = "SELECT passenger_id,email FROM passengers WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
          $_SESSION['passenger_id'] = $row['passenger_id'];

          echo "Success.";
          header('Location: index.php');
        }else{
          header('Location: index.php');
        }
      }
    }


    // Signup section
    if (isset($_POST['signup'])) {
      if (!empty($_POST['semail']) && !empty($_POST['spassword']) && !empty($_POST['cpassword']) && !empty($_POST['fname']) &&  !empty($_POST['lname']) && !empty($_POST['mobile'])) {
        $email = $_POST['semail'];
        $password = $_POST['spassword'];
        $cpassword = $_POST['cpassword'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $mobile = $_POST['mobile'];

        $query = "INSERT INTO passengers(email, fname, mname, lname, password, mobile) VALUES('$email', '$fname', '$mname', '$lname', '$password', $mobile)";
        $result = mysqli_query($conn, $query);

        if (false===$result) {
          $message = "Something went wrong. Please <a href=\"index.php\">try again</a>.";
          // header('Location: info.php');
          echo "Failed.";

        }else{
          $message = "You've successfully registered. You can <a href=\"index.php\">login</a>.";
          // header('Location: info.php');
          // die("Signup successfully");
          echo "Success.";
        }
      }
    }

    mysqli_close($conn);

    ?>

    <!-- Site body -->
    <div class="container-fluid site-body">
      <div class="row">
      </div>
    </div> <!-- /site-body -->

    <!-- Including the footer -->
    <?php include('footer.php'); ?>
  </body>
</html>
