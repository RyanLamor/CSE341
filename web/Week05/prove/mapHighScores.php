<?php
  require "dbConnect.php";
  $db = get_db();
  $Map_id = $_POST['map_id'];

  $stmt = $db->prepare('SELECT name, singleplayerhighscores FROM maps WHERE map_id=:map_id');
  $stmt->bindValue(':map_id', $Map_id, PDO::PARAM_INT);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($rows as $row)
    {
      $name = $row['name'];
      $scores = $row['singleplayerhighscores'];

      echo "<p>" . $name . " " . $scores . "</p><br>";
    }
 ?>
