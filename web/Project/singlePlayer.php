<?php
  session_start();
  require 'dbConnect.php';
  $db = get_db();

  $userID = $_SESSION['userID'];
  $username = $_SESSION['username'];
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
</head>
<body>
  <div>
    <?php
      echo '<h2>' . $username . '\'s Game </h2>';
      echo '<h3>' . 'Score:' . $score . 'Time: ' . $time . '</h3>';
     ?>
  </div>

</body>

</html>
