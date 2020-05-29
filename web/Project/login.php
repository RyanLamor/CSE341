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

  <div>
    <form onsubmit="return checkLogin()" action="main.php" method="post">
      <input id="userName" type="text" name="username" placeholder="Username">
      <input id="userPass" type="text" name="password" placeholder="Password">
      <button type="submit" class="btn btn-primary" name= "btn">Login</button>
      <a href="newUser.html" class="btn btn-primary">Create User</a>
    </form>
  </div>

</body>

</html>
