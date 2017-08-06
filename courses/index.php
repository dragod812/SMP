<?php include "../includes/header.php" ?>
<div class="firstViewWrapper" style="height: 2000px;">
  <div class="wrapper firstView">
    <h1 class="TC">Courses</h1>
    <hr />
    <div class="Grid Grid_full">
      <div class="Grid-cell">
        <div class="content">
          <?php
            include "../includes/db.php";
            $sql = "SELECT * FROM COURSES";
            $res = $conn->query($sql);
            if(!$res)
              echo "Not Possible";
            if($res->num_rows > 0){
              while($row = $res->fetch_assoc()){
                $cname = $row['CNAME'];
                $cdesc = $row['CDESC'];
                $sem_year = $row['SEM_YEAR'];
                $mentor = $row['MENTOR'];
                $img_src = "data:image/jpeg;base64,".base64_encode($row['IMG']);
                echo "<div class=\"Grid Grid_gutters Grid_1of4 Grid_bottom\"><div class=\"Grid-cell\"><div class=\"content\">";
                echo "<img class=\".crs-img\" src=\"".$img_src."\" height=\"250px\" style=\"margin: 0 auto;\">";
                echo "</div></div><div class=\"Grid-cell\"><div class=\"content TC\">";
                echo "<h2>".$cname."</h2>";
                echo "<strong><p>".$cdesc."</strong></p>";
                echo "<strong><p>".$sem_year."</strong></p>";
                echo "<p>".$mentor."</p>";
                echo "<a href=\"course.php?id=".$row['ID']."\">Learn More</a>";

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
<?php include "../includes/footer.php" ?>
