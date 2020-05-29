<?php
  session_start();
  require "dbConnect.php";
  $db = get_db();

  $stmt = $db->prepare('SELECT screen_name, friendlist FROM users WHERE username=:user_id');
  $stmt->bindValue(':username', $username, PDO::PARAM_STR);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $username = $rows[0]['username'];
  $friends = $rows[0]['friendlist'];

  $stmt = $db->prepare('SELECT m.name, gh.score, gh.time, gh.datecreated FROM maps m, users u, singleplayergamehistory gh
    WHERE gh.player = u.user_id
    AND u.user_id = :user_id
    AND gh.map_id = m.map_id
    ORDER BY gh.datecreated');
  $stmt->bindValue(':user_id', $_SESSION['userID'], PDO::PARAM_INT);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
      <?php
        echo "<h1>" . $username . "</h1>";
        echo "<h1>Recent Games Played</h2>";
        foreach ($rows as $row){
          echo "<p>" . $row['name'] . " " . $row['score'] . " " . $row['time'] . " " . $row['datecreated'] . "</p>";
        }
      ?>
    </header>
  </div>

</body>

</html>
