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
  $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Main Screen</title>
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
