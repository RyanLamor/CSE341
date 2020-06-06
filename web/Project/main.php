<?php
  session_cache_limiter('private_no_expire'); // works
  session_start();

  if (isset($_SESSION['newUserCreated'])){
    $username = $_SESSION['username'];
    echo "<script>alert('Welcome $username \n thank you for creating an account!')";
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Main Screen</title>
  <?php include 'head.php';?>

</head>
<body>
  <div>
    <header>
      <h1 class="title">Rain Drop Racing</h1>
    </header>
  </div>

  <div class="main" style="margin-top:75px;">
    <form class="menu" action="menuChoice.php" method="post">
      <button class="btn btn-outline-warning" type="submit" value="play.html" name="btn">Play</button><br>
      <button class="btn btn-outline-warning" type="submit" value="highScores.html" name="btn">High Scores</button><br>
      <button class="btn btn-outline-warning" type="submit" value="profile.php" name="btn">Profile</button><br>
      <button class="btn btn-outline-warning" type="submit" value="info.html" name="btn">Game Info</button><br>
    </form>
  </div>
</body>

</html>
