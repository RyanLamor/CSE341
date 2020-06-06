<?php
  session_start();
  require "dbConnect.php";
  $db = get_db();

  $userID =  $_SESSION['userID'];

  $stmt = $db->prepare('SELECT screen_name, friendlist FROM users WHERE user_id=:user_id');
  $stmt->bindValue(':user_id', $userID, PDO::PARAM_STR);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $username = $_SESSION['username'];
  $screen_name = $rows[0]['screen_name'];
  $friends = $rows[0]['friendlist'];

  $stmt = $db->prepare('SELECT m.name, gh.score, gh.time, gh.datecreated FROM maps m, users u, singleplayergamehistory gh
    WHERE gh.player = u.user_id
    AND u.user_id = :user_id
    AND gh.map_id = m.map_id
    ORDER BY gh.datecreated');
  $stmt->bindValue(':user_id', $userID, PDO::PARAM_INT);
  $stmt->execute();
  $singlePlayerGames = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $stmt = $db->prepare('SELECT m.name, gh.score, gh.time, gh.datecreated FROM maps m, users u, multiplayergamehistory gh
    WHERE gh.player1 = u.user_id
    AND u.user_id = :user_id
    AND gh.map_id = m.map_id
    ORDER BY gh.datecreated');
  $stmt->bindValue(':user_id', $userID, PDO::PARAM_INT);
  $stmt->execute();
  $multiPlayerGames = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Main Screen</title>
  <?php include 'head.php';?>
</head>
<body>
  <div class="go_back">
      <a href="main.php" class="btn btn-light">Return to Menu</a>
  </div>

  <div>
    <header>
      <?php
        echo "<h1>" . $screen_name . "</h1>";
        echo "<h2>Recent Games Played</h2>";
      ?>
    </header>
  </div>

  <div class="center">
    <h4>Single Player Games</h4>
    <?php
      echo "<table class='highScoreTable' border='1'>";
      echo "<tr><th>Map Name</th><th>Score</th><th>Time</th><th>Date</th>";
      foreach ($singlePlayerGames as $row){
        echo "<tr>";
          foreach ($row as $field => $value) {
              echo "<td>" . $value . "</td>";
          }
        echo "</tr>";
      }
      echo "</table>";
    ?>

    <br>
    <h4>Multi-Player Games</h4>

    <?php
        echo "<table class='highScoreTable' border='1'>";
        echo "<tr><th>Map Name</th><th>Score</th><th>Time</th><th>Date</th>";
        foreach ($multiPlayerGames as $row){
          echo "<tr>";
            foreach ($row as $field => $value) {
                echo "<td>" . $value . "</td>";
            }
          echo "</tr>";
        }


        //update to show list of friends
      ?>
  </div>

</body>

</html>
