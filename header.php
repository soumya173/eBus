<!-- Navbar -->
<nav class="navbar navbar-inverse site-header">
 <div class="container-fluid">
   <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#topNavbar">
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
     </button>
     <a class="navbar-brand nav-img" href="index.php"><img src="images/bus_logo.png" alt="" height="20px" width="20px">eBus</a>
   </div>
   <div class="collapse navbar-collapse" id="topNavbar">
     <ul class="nav navbar-nav">
       <li
          <?php
            if(isset($_SESSION['page']) && $_SESSION['page'] == 'index'){
              echo(' class="active"');
            }
          ?> ><a href="index.php">Home</a></li>
       <li><a href="#">Page 1</a></li>
     </ul>

     <?php

        if (isset($_SESSION['passenger_id']) && $_SESSION['page'] == 'profile') {
          echo('
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
              <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Log out</a></li>
            </ul>
          ');
        } elseif ($_SESSION['page'] == 'login' || $_SESSION['page'] == 'signup') {
          // Show nothing
        }else {
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
                    <input type="email" class="form-control" name="semail" placeholder="Enter email" maxlength="20" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="password" class="form-control" name="spassword" placeholder="Enter Password" maxlength="30" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" maxlength="30" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="fname" placeholder="First Name" maxlength="20" required>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="mname" placeholder="Middle Name" maxlength="20">
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="lname" placeholder="Last Name" maxlength="20" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="number" class="form-control" name="mobile" placeholder="Enter Mobile Number" maxlength="10" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-2 col-sm-offset-5">
                    <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
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
                  <input type="email" class="form-control" name="lemail" placeholder="Enter email" maxlength="20" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="lpassword" placeholder="Enter Password"  maxlength="30" required>
                </div>
              <div class="modal-footer">
                <button type="submit" name="login" class="btn btn-primary">Log In</button>
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
    $email = mysqli_real_escape_string($conn, $_POST['lemail']);
    $password = mysqli_real_escape_string($conn, $_POST['lpassword']);

    $query = "SELECT passenger_id,email FROM passengers WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
      $_SESSION['passenger_id'] = $row['passenger_id'];

      header('Location: profile.php');
    }else{
      $_SESSION['message'] = "It seems you typed invalid credentials. Please <a href=\"login.php\">try again</a>.";
      $_SESSION['type'] = "error";

      header('Location: info.php');
    }
  }
}

// Signup section
if (isset($_POST['signup'])) {
  if (!empty($_POST['semail']) && !empty($_POST['spassword']) && !empty($_POST['cpassword']) && !empty($_POST['fname']) &&  !empty($_POST['lname']) && !empty($_POST['mobile'])) {

    $email = mysqli_real_escape_string($conn, $_POST['semail']);
    $password = mysqli_real_escape_string($conn, $_POST['spassword']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $mname = mysqli_real_escape_string($conn, $_POST['mname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);

    $query = "INSERT INTO passengers(email, fname, mname, lname, password, mobile) VALUES('".$email."', '".$fname."', '".$mname."', '".$lname."', '".$password."',". $mobile .")";

    $result = mysqli_query($conn, $query);
    if (false===$result) {
      $_SESSION['message'] = "Something went wrong.<br />Error details: ". mysqli_error($conn) ."<br />Please <a href=\"signup.php\">try again</a>.";
      $_SESSION['type'] = 'error';

      header('Location: info.php');
    }else{
      $_SESSION['message'] = "You've successfully registered. You can <a href=\"login.php\">login</a>.";
      $_SESSION['type'] = 'success';

      header('Location: info.php');
    }
  }
}

?>
