<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Log in</title>

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
      $_SESSION['page'] = 'login';
    ?>

    <!-- Including the header -->
    <?php include('header.php'); ?>

    <!-- Site body -->
    <div class="container-fluid site-body">
      <div class="row login-row">
        <div class="col-sm-4 col-sm-offset-4">
          <h2 class="login-text">Login to proceed</h2>
          <form class="" action="" method="post">
            <div class="form-group">
              <input type="email" class="form-control email-input" name="lemail" placeholder="Enter email" maxlength="20" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="lpassword" placeholder="Enter Password"  maxlength="30" required>
            </div>
            <div class="form-group row">
              <div class="col-sm-9">
                <p>Don't have an account? <a href="signup.php">Sign Up</a>.</p>
              </div>
              <div class="col-sm-3">
                <button type="submit" name="login" class="btn btn-primary btn-block">Log In</button>
              </div>
              <div style="clear:both;"></div>
            </div>
          </form>
        </div>
      </div> <!-- /row -->
    </div> <!-- /site-body -->

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

    ?>

    <!-- Including the footer -->
    <?php include('footer.php'); ?>
  </body>
</html>
