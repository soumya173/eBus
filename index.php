<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <!-- Required stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- Required fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Vollkorn:400,700" rel="stylesheet">

    <!-- Required scripts -->
    <script src="js/jquery.min.js" charset="utf-8"></script>
    <script src="js/bootstrap.min.js" charset="utf-8"></script>

  </head>
  <body>
    <!-- DB connections -->
    <?php
      include('connect.php');
      $_SESSION['page'] = 'index';
    ?>

    <!-- Including the header -->
    <?php include('header.php'); ?>

    <?php
      // Counter calculations
      $user_query = "SELECT count(*) AS 'count' FROM passengers";
      $user_result = mysqli_query($conn, $user_query);
      $user_count = mysqli_fetch_assoc($user_result);

      $route_query = "SELECT count(*) AS 'count' FROM route";
      $route_result = mysqli_query($conn, $route_query);
      $route_count = mysqli_fetch_assoc($route_result);

      $bus_query = "SELECT count(*) AS 'count' FROM bus";
      $bus_result = mysqli_query($conn, $bus_query);
      $bus_count = mysqli_fetch_assoc($bus_result);

    ?>


    <!-- Site body -->
    <div class="container site-body">

      <!-- Feature section -->
      <div class="row">
        <div class="col-sm-12 section-header">
          <h2>Features</h2>
          <p>These are the coolest feature you can have.</p>
          <hr>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-3 feature-item">
          <span class="glyphicon glyphicon-list-alt"></span>
          <h4>Book Tickets Online</h4>
        </div>
        <div class="col-sm-3 feature-item">
          <span class="glyphicon glyphicon-lock"></span>
          <h4>Secure Transaction</h4>
        </div>
        <div class="col-sm-3 feature-item">
          <span class="glyphicon glyphicon-search"></span>
          <h4>Search Transports</h4>
        </div>
        <div class="col-sm-3 feature-item">
          <span class="glyphicon glyphicon-exclamation-sign"></span>
          <h4>Cancel Tickets Anytime</h4>
        </div>
      </div> <!-- /Feature section -->

      <!-- Counter section -->
      <div class="row">
        <div class="col-sm-12 section-header">
          <h2>Some Stats</h2>
          <p>Here are some numbers that helps you to choose us</p>
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4 counter-section">
          <h1><?php echo($user_count['count']); ?></h1>
          <h5>Users</h5>
        </div>
        <div class="col-sm-4 counter-section">
          <h1><?php echo($route_count['count']); ?></h1>
          <h5>Routes</h5>
        </div>
        <div class="col-sm-4 counter-section">
          <h1><?php echo($bus_count['count']); ?></h1>
          <h5>Buses</h5>
        </div>
      </div> <!-- /Counter section -->

      <!-- Reviews section -->
      <div class="row">
        <div class="col-sm-12 section-header">
          <h2>User reviews</h2>
          <p>Let's see what our users think about us</p>
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 review-section">
          <h4>Travel experience</h4>
          <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="9"
            aria-valuemin="0" aria-valuemax="10" style="width:90%">
              (9 / 10)
            </div>
          </div>
        </div>
        <div class="col-sm-6 review-section">
          <h4>Service satisfaction</h4>
          <div class="progress">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="8"
            aria-valuemin="0" aria-valuemax="10" style="width:80%">
              (8 / 10)
            </div>
          </div>
        </div>
      </div> <!-- /Reviews section -->

    </div> <!-- /site-body -->

    <!-- Including the footer -->
    <?php include('footer.php'); ?>
  </body>
</html>
