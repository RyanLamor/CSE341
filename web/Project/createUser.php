<?php
  session_start();
  require "dbConnect.php";
  $db = get_db();

  $username = $_POST['username'];
  $screen_name = $_POST['screen_name'];
  $password = $_POST['password'];

  try{
    $stmt = $db->prepare('INSERT INTO users (username, screen_name, password) VALUES (:username, :screen_name, :password) ');
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':screen_name', $screen_name);
    $stmt->bindValue(':password', $password);
    $success = $stmt->execute();

    $_SESSION['userID'] = $pdo->lastInsertId('user_id_seq');
    $_SESSION['newUserCreated'] = true;
    $_SESSION['username'] = $username;

  }
  catch (Exception $ex){
    echo "Error with DB. Details: $ex";
    die();
  }

  Header('Location: main.php');
  die();

?>
