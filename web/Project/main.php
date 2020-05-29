<?php
  session_start();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Main Screen</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

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
      <button type="submit" value="profile.html" name="btn">Profile</button><br>
      <button type="submit" value="info.html" name="btn">Game Info</button><br>
    </form>
  </div>
</body>

</html>
