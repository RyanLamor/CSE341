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

  <div class="shadow p-3 mb-5 bg-white rounded" id="main">
    <form class="loginForm" onsubmit="return checkLogin()" action="main.php" method="post">
      <input id="userName" type="text" name="username" placeholder="Username"><br>
      <input id="userPass" type="password" name="password" placeholder="Password"><br>
      <button type="submit" class="btn btn-primary" name= "btn">Login</button>
      <a href="newUser.php" class="btn btn-primary">Create User</a>
    </form>
  </div>

</body>

</html>
