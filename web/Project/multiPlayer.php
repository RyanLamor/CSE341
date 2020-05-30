<?php
  session_start();
  require 'dbConnect.php';
  $db = get_db();

  $userID = $_SESSION['userID'];
  $username = $_SESSION['username'];
  $screen_name = $_SESSION['screen_name'];
  $map_id = $_POST['map_id'];

  //generate random times
  $seconds = rand(60, 600);
  $time = date("i:s", $seconds);

  $opp_seconds = rand(60, 600);
  $opp_time = date("i:s", $seconds);

  //generate random scores
  $baseScore = (600-$seconds) * 100;
  $bonusScore = rand(1000, 25000);
  $score = $baseScore + $bonusScore;

  $opp_baseScore = (600-$opp_seconds) * 100;
  $opp_bonusScore = rand(1000, 25000);
  $opp_score = $opp_baseScore + $opp_bonusScore;

  //get random opponent
  $results = $db->query('SELECT user_id FROM users');
  $num_rows = mysql_num_rows($results);
  $index = rand(0, $num_rows);

  $opponent_id = $results[$index];

  if ($opponent_id == $userID){
    $opponent_id = $results[$index - 1];
  }

  //update database
  try{
    $stmt = $db->prepare('INSERT INTO multiplayergamehistory (map_id, player1, player2, score, time, isHighScore, dateCreated)
    VALUES(
      :map_id,
      :user_id,
      :opponent_id,
      :score,
      :time,
      false,
      :date);');
    $stmt->bindValue(':map_id', $map_id);
    $stmt->bindValue(':user_id', $userID);
    $stmt->bindValue(':opponent_id', $opponent_id);
    $stmt->bindValue(':score', $score);
    $stmt->bindValue(':time', $time);
    $stmt->bindValue(':date', date("Y/m/d"));
    $stmt->execute();
  }
  catch (Exception $ex){
      echo "Error with DB. Details: $ex";
      die();
    }

  //get opponent info
  try{
    $stmt = $db->prepare('SELECT screen_name FROM users WHERE user_id=:opponent_id');
    $stmt->bindValue(':opponent_id', $opponent_id);
    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $opp_screen_name = $rows[0]['screen_name'];

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Muli-Player Game</title>
  <?php include 'head.php';?>
</head>
<body>
  <div>
    <?php
      echo '<h2>' . $screen_name . '\'s Game </h2>';
      echo '<h3>' . 'Score: ' . $score . ' Time: ' . $time . '</h3><br>';

      echo '<h2>' . $opp_screen_name . '\'s Game </h2>';
      echo '<h3>' . 'Score: ' . $oop_score . ' Time: ' . $opp_time . '</h3><br>';

      if ($score > $opp_score){
        echo '<h2 style="color:green">You WON!</h2>';
      }
      else{
        echo '<h2 style="color:red">You LOST!</h2><br>';
      }
     ?>
  </div>

  <div>
    <form action="selectMap.php" method="post">
      <button type="submit" class="btn btn-light" name= "play" value="multiPlayer">Play Again</button>
      <a href="main.php" class="btn btn-light">Return to Menu</a>
    </form>
  </div>

</body>

</html>
