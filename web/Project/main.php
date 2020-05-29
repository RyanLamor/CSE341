<?php
  session_start();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Main Screen</title>
  <?php include('head.php');?>
</head>
<body>
  <div>
    <header>
      <h1>Rain Drop Racing</h1>
    </header>
  </div>

  <div class='form'>
    <form action="menuChoice.php" method="post">
      <button type="submit" value="play.html" name="btn">Play</button><br>
      <button type="submit" value="highScores.html" name="btn">High Scores</button><br>
      <button type="submit" value="profile.php" name="btn">Profile</button><br>
      <button type="submit" value="info.html" name="btn">Game Info</button><br>
    </form>
  </div>
</body>

</html>
