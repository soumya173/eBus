<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profile</title>

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
      $_SESSION['page'] = 'profile';
    ?>

    <!-- Including the header -->
    <?php include('header.php'); ?>

    <div class="container-fluid site-body profile-body">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
          <ul class="nav nav-tabs profile-tabs">
            <li class="active"><a data-toggle="tab" href="#book">Booking Details</a></li>
            <li><a data-toggle="tab" href="#profile">Profile Details</a></li>
          </ul>

          <div class="tab-content">
            <div id="book" class="tab-pane fade in active booking-container">
              <h3>RECENT BOOKINGS</h3>

              <?php
                $passenger_id = $_SESSION['passenger_id'];
                $query = "SELECT seat, date, timestamp, origin, destination, dept_time, arr_time, reserve_id FROM reservation WHERE passenger_id = $passenger_id";
                $result = mysqli_query($conn, $query) or die("result error");
                if (mysqli_num_rows($result) > 0){
              ?>

                <table class="table">
                  <thead>
                    <tr>
                      <th>SL No.</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>From</th>
                      <th>To</th>
                      <th>No of Seat</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sl_no = 1;
                      while ($row = mysqli_fetch_assoc($result)) {
                      // while ($sl_no < 5) {
                        $timestamp = strtotime($row['timestamp']);

                        $date = date('d-m-Y', $timestamp);
                        $time = date('g:i A', $timestamp);
                        echo("<tr>");

                        echo("<td>$sl_no</td>");
                        echo("<td>$date</td>");
                        echo("<td>$time</td>");
                        // echo("<td>$row['origin']</td>");
                        // echo("<td>$row['destination']</td>");
                        // echo("<td>$row['seat']</td>");

                        echo("</tr>");
                        $sl_no = $sl_no + 1;
                      }
                    ?>
                  </tbody>
                </table>
              <?php }else {
                  echo("<p>Start booking your tickets now.</p>");
              } ?>
            </div>
            <div id="profile" class="tab-pane fade">
              <h3>Menu 1</h3>
              <p>Some content in menu 1.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Including the footer -->
    <?php include('footer.php'); ?>
  </body>
</html>
