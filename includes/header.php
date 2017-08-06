<?php session_start();?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>SMP</title>
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../css/header.css">
      <link rel="stylesheet" href="../css/grid.css">
      <link rel="stylesheet" href="../css/component.css">
      <style>
        .zero-bottom-margin{
          margin-bottom: 0; !important;
        }
      </style>
</head>

<body>
  <div class="headerWrapper">
  <div class="wrapper header">
    <div class="Grid Grid_gutters Grid_1of2">
      <div class="Grid-cell">
        <div class="content zero-bottom-margin">
          <img src="http://placehold.it/100x50/CC99CC/ffffff&text=Logo" style="vertical-align: middle; margin-right: 1em;" class="headerLogo"><strong> Student Mentorship programme</strong>
        </div>
      </div>

      <a href="javascript:void(0);" class="icon" onclick="showNav()">&#9776;</a>
      <ul class="navigation" id="myNavigation">

        <li><a href="#" class="frst">About</a></li>
        <li><a href="#">Gallery</a></li>
        <li><a href="#">Courses</a></li>
        <li><a href="#">Team</a></li>
        <?php
          if(isset($_SESSION['USERNAME'])){
            echo "<li><a href=\"../includes/logout.php\">Logout</a></li>";
          }
          else{
            echo "<li><a href=\"#\">Register</a></li>";
          }
        ?>

      </ul>

    </div>
  </div>
</div>
