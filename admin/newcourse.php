<?php include '../includes/header.php'; ?>
<?php
  if(!isset($_SESSION['USERNAME'])){
    header("Location: ./index.php");
  }

?>
<div class="firstViewWrapper" >
  <div class="wrapper firstView">
    <h1><?php if(isset($_GET['newcourse'])){echo $_GET['cname'];  $_SESSION['cname'] = $_GET['cname'];}?></h1>
    <hr />
    <form method="post" action="upload.php" enctype="multipart/form-data">
    <div class="Grid Grid_full">
      <div class="Grid-cell">
        <div class="content GridC">
          <h3>Course Description</h3>
          <input type="text" name="cdesc" placeholder="Short Description">
          <textarea name="cdesc_long" placeholder="Long Description" cols="30" rows="8"></textarea>
        </div>
      </div>
    </div>
    <div class="Grid Grid_full">
      <div class="Grid-cell">
        <div class="content GridC">
          <h3>Semester I/II, 20XX-XX</h3>
          <input type="text" name="sem_year" placeholder="Semester I, 2017-18  or Semester II, 2017-18">
        </div>
      </div>
    </div>
    <div class="Grid Grid_full">
      <div class="Grid-cell">
        <div class="content GridC">
          <h3>Mentor Details</h3>
          <input type="text" name="mentor" placeholder="Name">
          <input type="text" name="mentor_ph" placeholder="Phone Number">
          <input type="text" name="mentor_fb_lnk" placeholder="Facebook Link">
        </div>
      </div>
    </div>
    <div class="Grid Grid_full">
      <div class="Grid-cell">
        <div class="content GridC">
          <h3>Course Image</h3>
          <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
          <input name="crs_img" type="file" id="userfile">
        </div>
      </div>
    </div>
    <div class="Grid Grid_full">
      <div class="Grid-cell">
        <div class="content GridC">
          <h3>Upload Files</h3>
          <div class="Grid Grid_gutters Grid_cols-3">
            <div class="Grid-cell">
              <div class="content">
                <p>Number of files to upload: </p>
              </div>
            </div>
            <div class="Grid-cell">
              <div class="content">
                <input type="number" name="num_of_uploads" value="0" min="0" max="10">
              </div>
            </div>
            <div class="Grid-cell">

            </div>
            <div class="Grid-cell">
              <div class="content">
                <input type="button" name="gen_upload" onclick="generateUpload()" value="Go">
              </div>
            </div>
          </div>


          <div id="uploadFiles">

          </div>
        </div>
      </div>
    </div>
    <div class="Grid Grid_gutters Grid_cols-3">
      <div class="Grid-cell">

      </div>
      <div class="Grid-cell">
        <div class="content">
          <button type="submit" name="submit">Create Course</button>
        </div>
      </div>
      <div class="Grid-cell">

      </div>

    </div>

  </form>
  </div>
</div>
<?php include '../includes/footer.php'; ?>
