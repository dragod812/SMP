<?php
  session_start();
  if(!isset($_SESSION['USERNAME'])){
    header("Location: ./index.php");
  }
  if($_SERVER["REQUEST_METHOD"] === "POST"){
    include '../includes/db.php';
    $cname = $conn->real_escape_string($_SESSION["cname"]);
    $cdesc = $conn->real_escape_string($_POST["cdesc"]);
    $cdesc_long = $conn->real_escape_string($_POST["cdesc_long"]);
    $sem_year = $conn->real_escape_string($_POST["sem_year"]);
    $mentor = $conn->real_escape_string($_POST["mentor"]);
    $mentor_ph = $conn->real_escape_string($_POST["mentor_ph"]);
    $mentor_fb_lnk = $conn->real_escape_string($_POST["mentor_fb_lnk"]);
    $tmpName  = $_FILES['crs_img']['tmp_name'];
    $fp = fopen($tmpName, 'r');
    $content = fread($fp, filesize($tmpName));
    $content = addslashes($content);
    fclose($fp);
    $sql = "INSERT INTO COURSES(CNAME, CDESC, CDESC_LONG, SEM_YEAR, MENTOR, MENTOR_PH, MENTOR_FB_LNK, IMG)
    VALUES('{$cname}','{$cdesc}','{$cdesc_long}','{$sem_year}','{$mentor}','{$mentor_ph}','{$mentor_fb_lnk}','{$content}')";

    if($conn->query($sql) == true){
      $flag = true;
      $c_id = $conn->insert_id;
      $N = $_POST["num_of_uploads"];
      for($i = 1;$i<$N;$i++){

        $iname = "file".$i;
        $fname = $_FILES[$iname]['name'];
        $tmpName = $_FILES[$iname]['tmp_name'];
        $ftype = $_FILES[$iname]['type'];
        $fsize = $_FILES[$iname]['size'];
        $fp = fopen($tmpName, 'r');
        $content = fread($fp, filesize($tmpName));
        $content = addslashes($content);
        fclose($fp);
        $sql = "INSERT INTO FILES (C_ID, FNAME, FTYPE, FSIZE, FILE) VALUES
        ({$c_id},'{$fname}','{$ftype}',{$fsize},'{$content}')";
        if($conn->query($sql) == false){
          $flag = false;
          echo $fname;
          break;
        }
      }
      if($flag)
      header("Location: ./index.php");
      else {

        echo $conn->error;
      }
    }
    else{
      echo $conn->error;
    }

  }
?>
