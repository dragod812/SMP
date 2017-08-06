<?php session_start(); ?>
<?php
  if(isset($_SESSION['USERNAME'])){
     session_destroy();
  }
  header("Location: ../index.html");
?>
