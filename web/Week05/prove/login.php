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
      <h1>Login</h1>
    </header>
  </div>

  <div>
    <form action="loginCheck.php" method="post">
      <input type="text" name="username" placeholder="Username">
      <input type="text" name="password" placeholder="Password">
      <input type="submit" name= "btn"Value="Login">
      <input type="submit" name="btn" Value="Create User">
    </form>
  </div>

</body>

</html>
