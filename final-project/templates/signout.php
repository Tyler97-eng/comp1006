<?php
  // signout file called from a element in other pages
  require 'header.php';
  // session begins
  session_start();
  // session admin_id set to 0 to remove authorization
  $_SESSION['admin_id'] = 0;
  // session is unset and destroyed
  session_unset();
  session_destroy();
  // sends user back to the home page
  header('Location:../index.php');
  require 'footer.php';
?>
