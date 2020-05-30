<?php
  session_start();
  require 'dbConnect.php';
  $db = get_db();
  $username = $_POST['username'];
  $password = $_POST['password'];
  $_SESSION['username'] = $username;

  if ( !isset($_SESSION['loginAttempts']) )
    $_SESSION['loginAttempts'] = 1;


  $stmt = $db->prepare('SELECT user_id, screen_name FROM users WHERE username=:username AND password=:password');
  $stmt->bindValue(':username', $username, PDO::PARAM_STR);
  $stmt->bindValue(':password', $password, PDO::PARAM_STR);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if ( isset($rows[0]['user_id']) ){
    $_SESSION['userID'] = $rows[0]['user_id'];
    $_SESSION['screen_name'] = $rows[0]['screen_name'];
    echo 'true';
  }
   /*
  else {
    $_SESSION['loginAttempts'] += 1;
    if ($_SESSION['loginAttempts'] < 3){
      echo "alert('Username/Password combination not found');"
    }
    else{
      echo "<script>
      alert('Please Create a New User');
      window.location.href='newUser.html';
      </script>";
    }
  }
  */
?>
