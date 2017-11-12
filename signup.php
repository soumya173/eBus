<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sign Up</title>

    <!-- Required stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- Required fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Vollkorn:400,700" rel="stylesheet">

    <!-- Required scripts -->
    <script src="js/jquery.min.js" charset="utf-8"></script>
    <script src="js/bootstrap.min.js" charset="utf-8"></script>
    <script src="js/scripts.js" charset="utf-8"></script>

  </head>
  <body>
    <!-- Including the navbar -->
    <?php
      include('connect.php');
      $_SESSION['page'] = 'signup';
    ?>

    <!-- Including the header -->
    <?php include('header.php'); ?>

    <!-- Site body -->
    <div class="container-fluid site-body">
      <div class="row signup-row">
        <div class="col-sm-4 col-sm-offset-4">
          <h2 class="signup-text">Register to proceed</h2>
          <form class="" action="" method="post">
            <div class="form-group">
              <input type="email" class="form-control" name="semail" placeholder="Enter email" maxlength="20" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="spassword" placeholder="Enter Password" maxlength="30" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" maxlength="30" required>
            </div>
            <div class="form-group">
              <div class="col-sm-4 signup-fname">
                <input type="text" class="form-control" name="fname" placeholder="First Name" maxlength="20" required>
              </div>
              <div class="col-sm-4 signup-mname">
                <input type="text" class="form-control" name="mname" placeholder="Middle Name" maxlength="20">
              </div>
              <div class="col-sm-4 signup-lname">
                <input type="text" class="form-control" name="lname" placeholder="Last Name" maxlength="20" required>
              </div>
              <div style="clear:both;"></div>
            </div>
            <div class="form-group">
              <input type="number" class="form-control" name="mobile" placeholder="Enter Mobile Number" maxlength="10" required>
            </div>
            <div class="form-group row">
              <div class="col-sm-9">
                <p>Already have an account? <a href="login.php">Log In</a>.</p>
              </div>
              <div class="col-sm-3">
                <button type="submit" name="signup" class="btn btn-primary btn-block">Sign Up</button>
              </div>
              <div style="clear:both;"></div>
            </div>

          </form>
        </div>
      </div> <!-- /row -->
    </div> <!-- /site-body -->

    <?php

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

    <!-- Including the footer -->
    <?php include('footer.php'); ?>
  </body>
</html>
