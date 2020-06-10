<!DOCTYPE html>
<html lang="en">
<head>
  <title>Main Screen</title>
  <?php include 'head.php';?>
  <script src="loginCheck.js"></script>
</head>
<body>
  <div>
    <header>
      <h1>Login</h1>
    </header>
  </div>

  <div class="main">
    <form class='loginForm' action="createUser.php" method="post">
      <input id="userName" type="text" name="username" placeholder="Username"><br>
      <input id="screenName" type="text" name="screen_name" placeholder="Screen Name"><br>
      <input id="userPass" type="text" name="password" placeholder="Password">
      <button type="submit" class="btn btn-primary" name= "btn">Creater User</button>
    </form>
  </div>

</body>

</html>
