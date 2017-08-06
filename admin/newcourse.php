<?php include '../includes/header.php'; ?>
<?php
  if(!isset($_SESSION['USERNAME'])){
    header("Location: ./index.php");
  }
?>
<div class="firstViewWrapper" >
  <div class="wrapper firstView">
    <h1><?php if(isset($_GET['newcourse']))echo $_GET['cname']; ?></h1>
    <hr />
    <div class="Grid Grid_full">
      <div class="Grid-cell">
        <div class="content GridC">
          <h3>Course Description</h3>
          <input type="text" name="cdesc" placeholder="Short Description">
          <textarea placeholder="Long Description" cols="30" rows="8"></textarea>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include '../includes/footer.php'; ?>
