<?php
  require "dbConnect.php";
  include "head.php";
  $db = get_db();
  $Map_id = $_POST['map_id'];

  $stmt = $db->prepare('SELECT m.name, gh.score, u.screen_name, gh.time, gh.datecreated FROM singleplayergamehistory gh, maps m, users u
  WHERE gh.isHighScore = true
  AND gh.map_id = m.map_id
  AND gh.player = u.user_id
  AND m.map_id=:map_id
  ORDER BY gh.score DESC');
  $stmt->bindValue(':map_id', $Map_id, PDO::PARAM_INT);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo "<table class='highScoreTable' border='1'>";
  echo "<header><h2>Single Player Games</h2></header>";
  echo "<tr><th>Map Name</th><th>Score</th><th>Player</th><th>Time</th><th>Date</th>";
  foreach ($rows as $row){
    echo "<tr>";
      foreach ($row as $field => $value) {
          echo "<td>" . $value . "</td>";
      }
    echo "</tr>";
  }
  echo "</table>";

  echo '<a href="highScores.html" class="btn btn-light">Go Back</a>';
 ?>
