<?php
  $serv_name = "localhost";
  $username = "SMP_ADMIN";
  $password = "iamsmpadmin";
  $db = "smp_admin";
  $conn = new mysqli($serv_name, $username, $password, $db);
  if($conn->connect_error)
    echo "Connection Error: ".$conn->connect_error;
  
 ?>
