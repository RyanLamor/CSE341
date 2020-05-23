<?php
  session_start();
  require 'dbConnect.php';
  $db = get_db();
  $username = $_POST['username'];
  $password = $_POST['password'];
  $_SESSION['loginAttempts'] = 1;


  $stmt = $db->prepare('SELECT user_id, username, password FROM users WHERE username=:username AND password=:password');
  $stmt->bindValue(':username', $username, PDO::PARAM_STR);
  $stmt->bindValue(':password', $password, PDO::PARAM_STR);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if ( isset($rows[0]['user_id']) ){
    $_SESSION['userID'] = $rows[0]['user_id'];
    Header('Location: main.html');
  }
  else {
    $_SESSION['loginAttempts'] += 1;
    if ($_SESSION['loginAttempts'] < 3){
      alert('Username/Password combination not found');
    }
    else{
      echo "<script>
      alert('Please Create a New User');
      window.location.href='newUser.html';
      </script>";
    }
  }
?>
