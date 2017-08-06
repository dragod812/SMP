<?php include '../includes/header.php'; ?>
<?php
  if(!isset($_SESSION['USERNAME'])){
    header("Location: ./index.php");
  }
?>
<div class="firstViewWrapper" >
  <div class="wrapper firstView">
    <form action="newcourse.php" method="get" >
    <div class="Grid Grid_gutters Grid_3of1">
      <div class="Grid-cell">
        <div class="content">
          <input type="text" name="cname" placeholder="Enter New Course Name" style="width: 100%;">
        </div>
      </div>
      <div class="Grid-cell">
        <div class="content">
          <button name="newcourse" type="submit">New Course</button>
        </div>
      </div>
    </div>
    </form>
    <h1 class="TC">Existing Courses</h1>
    <hr />
    <div class="Grid Grid_full">
      <div class="Grid-cell">
        <div class="content">
          <?php
            include "../includes/db.php";
            $sql = "SELECT * FROM COURSES";
            $res = $conn->query($sql);

            if($res->num_rows > 0){
              while($row = $res->fetch_assoc()){
                $cname = $row['CNAME'];
                $cdesc = $row['CDESC'];
                $sem_year = $row['SEM_YEAR'];
                $mentor = $row['MENTOR'];
                $img_src = "data:image/jpeg;base64,".base64_encode($row['IMG']);
                echo "<div class=\"Grid Grid_gutters Grid_1of3 Grid_middle\"><div class=\"Grid-cell\"><div class=\"content GridC GC GS\">";
               echo "<img class=\"crs-img\" src=\"".$img_src."\">";
                echo "</div></div><div class=\"Grid-cell\"><div class=\"content TC\">";
                echo "<h2>".$cname."</h2>";
                echo "<strong><p>".$cdesc."</strong></p>";
                echo "<strong><p>".$sem_year."</strong></p>";
                echo "<p>".$mentor."</p>";
                echo "<a href=\"../courses/course.php?id=".$row['ID']."\">Learn More</a>";
                echo "  |  ";
                echo "<a href=\"newcourse.php?id=".$row['ID']."\">Edit</a>";
                echo "</div>
              </div>
            </div>
            <hr />";
              }
            }
          ?>
        <!--  <div class="Grid Grid_gutters Grid_1of4 Grid_bottom">
            <div class="Grid-cell">
              <div class="content">
                <img class=".crs-img" src="https://upload.wikimedia.org/wikipedia/commons/3/38/Arduino_Uno_-_R3.jpg" height="250px" style="margin: 0 auto;">
              </div>
            </div>
            <div class="Grid-cell">
              <div class="content TC">
                <h2>Lecture on Arduino basics</h2>
                <strong><p>Line Following Robot</p></strong>
                <strong><p>Semester 1, 2015-16</p></strong>
                <p>Mustafa</p>
                <a href="">Learn More</a>
              </div>
            </div>
          </div>
          <hr /> -->

        </div>
      </div>

    </div>
  </div>
</div>
<?php include '../includes/footer.php'; ?>
