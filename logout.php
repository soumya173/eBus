<?php

  // Destroy all the $_SESSION variables
  session_start();
  session_destroy();

  header('Location: index.php');

?>
