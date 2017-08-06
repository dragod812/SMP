
<?php include '../includes/header.php';?>
<?php
  if(isset($_SESSION['USERNAME'])){
    header("Location: ./courses.php");
  }
?>
<?php
  if(isset($_POST['login'])){
    include '../includes/db.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);
    $sql = "SELECT * FROM USERS WHERE USERNAME = '{$username}';";
    $res = $conn->query($sql);
    if(!$res)
      echo "Query Failed.";
    while($row = $res->fetch_assoc()){
      $db_password = $row['PASSWORD'];
      if($db_password === $password){
        $_SESSION['USERNAME'] = $username;
        $_SESSION['PASSWORD'] = $password;
        $_SESSION['INVALID'] = null;
        header("Location: ./courses.php");
      }
      else{
        $_SESSION['INVALID'] = "Invalid Username/password";
        header("Location: ./index.php");
      }
    }
  }
?>
<div class="firstViewWrapper" >
  <div class="wrapper firstView">
    <div class="Grid Grid_gutters Grid_cols-3 GM" style="height: 80vh;">
      <div class="Grid-cell">
      </div>
      <div class="Grid-cell">
        <div class="content">
          <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="GridC">
          <input type="text" name="username" placeholder="username">
          <input type="password" name="password" placeholder="password">
          <button name="login" type="submit">Login</button>
          
        </form>
        </div>
      </div>
      <div class="Grid-cell">
      </div>
    </div>
  </div>
</div>
<?php include '../includes/footer.php'; ?>
