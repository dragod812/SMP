<?php include "../includes/header.php" ?>
<div class="firstViewWrapper" style="height: 2000px;">
  <div class="wrapper firstView">
    <?php
      include "../includes/db.php";
      if(isset($_GET['id'])){

        $id = (int)$_GET['id'];
        if(is_int($id)){
          $sql = "SELECT * FROM COURSES WHERE ID = ".$id.";";

          $res = $conn->query($sql);

          if($res->num_rows > 0){
            while($row = $res->fetch_assoc()){
              $cname = $row['CNAME'];
              $cdesc = $row['CDESC_LONG'];
              $img_src = "data:image/jpeg;base64,".base64_encode($row['IMG']);
              echo "<div class=\"Grid Grid_full\"><div class=\"Grid-cell\"><div class=\"content TC\"><h1>";
              echo $cname;
              echo "</h1><hr /></div></div></div>";

              echo "<div class=\"Grid Grid_full\"><div class=\"Grid-cell\"><div class=\"content TC\"><p>";
              echo $cdesc;
              echo "</p></div></div></div>";
            }
          }
        }
      }
      else{
        header("Location: ./index.php");
      }
    ?>
    <div class="Grid Grid_gutters Grid_cols-3">
      <div class="Grid-cell">
      </div>
      <div class="Grid-cell">
        <div class="content">
          <h3>Files Uploaded</h3>
          <hr />
          <ul>
            <?php
              include '../includes/db.php';

              $c_id = $_GET['id'];
              $sql = "SELECT FNAME FROM FILES WHERE C_ID = ".$c_id.";";
              $res = $conn->query($sql);
              if($res->num_rows > 0){
                while($row = $res->fetch_assoc()){
                  $fname = $row['FNAME'];
                  echo "<li><a target='_blank' href=\"download.php?c_id={$c_id}&fname={$fname}\">{$fname}</a></li>";
                }
              }
              else{
                echo "<li>No Files Uploaded</li>";
              }
            ?>
          </ul>
        </div>
      </div>
      <div class="Grid-cell">
      </div>
    </div>

   <!-- <div class="Grid Grid_full">
      <div class="Grid-cell">
        <div class="content TC">
          <h1>Arduino Basics</h1>
          <hr />
        </div>
      </div>
    </div>
    <div class="Grid Grid_full">
      <div class="Grid-cell">
        <div class="content TC">
          <p>Course Description Course Description Course Description Course Description Course DescriptionCourse Description</p>
        </div>
      </div>
    </div>
    <div class="Grid Grid_full">
      <div class="Grid-cell">
        <div class="content">
          <h3>Handout</h3>
          <hr />
        </div>
      </div>
    </div> -->
  </div>
</div>
<?php include "../includes/footer.php" ?>
