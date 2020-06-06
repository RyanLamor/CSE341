<?php
  session_start();
  require 'dbConnect.php';
  $db = get_db();

  $userID = $_SESSION['userID'];
  $username = $_SESSION['username'];
  $screen_name = $_SESSION['screen_name'];
  $map_id = $_POST['map_id'];

  //generate random time
  $seconds = rand(60, 600);
  $time = date("i:s", $seconds);

  //generate random score
  $baseScore = (600-$seconds) * 100;
  $bonusScore = rand(1000, 25000);
  $score = $baseScore + $bonusScore;

  //update database
  try{
    $stmt = $db->prepare('INSERT INTO singleplayergamehistory (map_id, player, score, time, isHighScore, dateCreated)
    VALUES(
      :map_id,
      :user_id,
      :score,
      :time,
      false,
      :date);');
    $stmt->bindValue(':map_id', $map_id);
    $stmt->bindValue(':user_id', $userID);
    $stmt->bindValue(':score', $score);
    $stmt->bindValue(':time', $time);
    $stmt->bindValue(':date', date("Y/m/d"));
    $stmt->execute();

    echo '<script type="text/javascript">',
     'updateHighScores();',
     '</script>';
  }
  catch (Exception $ex){
      echo "Error with DB. Details: $ex";
      die();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Single Player Game</title>
  <?php include 'head.php';?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>
  <div class="main">
    <?php
      echo '<h2>' . $screen_name . '\'s Game </h2>';
      echo '<h3>' . 'Score: ' . $score . ' Time: ' . $time . '</h3><br>';
     ?>
    <form action="selectMap.php" method="post">
      <button type="submit" class="btn btn-light" name= "play" value="singlePlayer">Play Again</button>
      <a href="main.php" class="btn btn-light">Return to Menu</a>
    </form>
  </div>

</body>

</html>
