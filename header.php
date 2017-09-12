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
       <li class="active"><a href="#">Home</a></li>
       <li><a href="#">Page 1</a></li>
       <li><a href="#">Page 2</a></li>
       <li><a href="#">Page 3</a></li>
     </ul>
     <ul class="nav navbar-nav navbar-right">
       <li><a href="#" data-toggle="modal" data-target="#signUpModal"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
       <li><a href="#" data-toggle="modal" data-target="#logInModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
     </ul>

     <!-- Modals -->
      <div id="signUpModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Sign Up</h4>
            </div>
            <form method="post" action="">
              <div class="modal-body">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Enter Password">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password">
                </div>
                <button type="submit" class="btn btn-primary">Sign Up</button>
              </div>
              <div class="modal-footer">
                <button type="button" name="signup" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div> <!-- /modal-content -->
        </div>
      </div>

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
                  <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary">Log In</button>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div> <!-- /modal-content -->
        </div>
      </div>

   </div>
 </div>
</nav> <!-- /navbar -->


<?php
// Login section
include('connect.php');
session_start();
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (!empty($email) && !empty($password)) {
    $query = "SELECT 'passenger_id','email','password' FROM 'passengers' WHERE 'email'='".$email."' AND 'password'='".$password."';";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {

      $_SESSION['passenger_id'] = $row['passenger_id'];


      echo "Success.";
      // header('Location: profile.php');
    }else{
      // header('Location: index.php');
      echo "Failed.";
    }
  }
}


// Signup section


?>
