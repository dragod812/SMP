<?php
  include '../includes/db.php';
  if(isset($_GET['c_id']) && isset($_GET['fname'])){
    $c_id = $conn->real_escape_string($_GET['c_id']);
    $fname = $conn->real_escape_string($_GET['fname']);
    $sql = "SELECT FSIZE, FTYPE, FILE FROM FILES WHERE C_ID = {$c_id} AND FNAME = '{$fname}';";
    $res = $conn->query($sql);
    if(!$res){
      echo $conn->error;
    }
    if($res->num_rows > 0){
      list($fsize, $ftype, $file) = $res->fetch_assoc();
      header("Content-length: $fsize");
      header("Content-type: $ftype");
      header("Content-Disposition: attachment; filename=$fname");
      echo $file;
    }
  }
  $conn->close();
  exit;
?>
