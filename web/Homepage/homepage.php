<!DOCTYPE html>
<html lang="en">
<head>
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <!--Header-->
	<div class="header">
		<header>
			<h1>Ryan's CSE 341 Homepage</h1>
      <?php
        date_default_timezone_set('America/Boise'); // CDT
        echo "Today is " , date('d/m/Y'), "\nThe current time is ", date('H:i:s');
      ?>
		</header>
	</div>

	<!--Menu Navigation Bar-->
	<div class="nav_menu">
		<a id="currentPage" href="#">Home</a>
		<a href="assignments.html">Assignments</a>
    <a href="https://group02.herokuapp.com/">Group 2 Work</a>
    <a href="../Week05/prove/login.html">Project</a>
	</div>

  <!--Main Body-->
  <div>
    <p>My name is Ryan Lamoreaux. I am from the wonderful sin city Las Vegas, NV, where
       I come from a family of 6. I am the oldest sibling and cousin in my family.
       I currently am a Junior studying Computer Science at BYUI. I have been married
       for just over one year. I love playing video/board games, rock climbing and cycling.
  </div>

  <!-- Photo Grid -->
  <div class="row">
    <div class="column">
      <img src="MeAndWife.jpg" alt="Me and Wife at SixFlags Clifornia, 2019" style="width:100%">
    </div>

    <div class="column">
      <img src="rockClimbing.jpg" alt="Rock Climbing at Red Rock Nevada, 2015" style="width:100%">
    </div>

    <div class="column">
      <img src="Biking.jpg" alt="Church of Jesus Christ of Latter-Day Saints, North Las Vegas Stake, 500 mile bike ride, 2015" style="width:100%;">
    </div>
  </div>

  <br>


  <!--Footer-->
  <div class="footer">
    <footer><h2>Thanks for visiting!</h2></footer>
  </div>
</body>

</html>
