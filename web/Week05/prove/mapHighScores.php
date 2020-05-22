<?php
  require "dbConnect.php";
  $db = get_db();
  $Map_id = $_POST['map_id'];

  $stmt = $db->prepare('SELECT m.name, gh.score, u.screen_name, gh.time, gh.datecreated FROM singleplayergamehistory gh, maps m, users u
  WHERE gh.isHighScore = true
  AND gh.map_id = m.map_id
  AND gh.player = u.user_id
  AND m.map_id=:map_id
  ORDER BY gh.score');
  $stmt->bindValue(':map_id', $Map_id, PDO::PARAM_INT);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($rows as $row)
    {
      $name = $row['name'];
      $score = $row['score'];
      $time = $row['time'];
      $date = $row['datecreated'];

      echo "<p>" . $name . " " . $score . " ". $time . " " . $date . "</p><br>";
    }

 ?>
