<?php
  session_start();
  require "dbConnect.php";
  $db = get_db();

  $username = $_POST['username'];
  $screen_name = $_POST['screen_name'];
  $password = $_POST['password'];

  $stmt = $db->prepare('INSERT INTO user (username, screen_name, password) VALUES (:username, :screen_name, :password) ');
  $stmt->bindValue(':username', $username, PDO::PARAM_STR);
  $stmt->bindValue(':screen_name', $screen_name, PDO::PARAM_STR);
  $stmt->bindValue(':password', $password, PDO::PARAM_STR);
  $stmt->execute();

  $newId = $pdo->lastInsertId('user_id_seq');
  $_SESSION['userID'] = $newId;

  echo "<script>
  alert('New User Created');
  window.location.href='main.php';
  </script>";
?>
