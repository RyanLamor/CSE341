<?php
  $playType = $_POST['play'];

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Map Select</title>
  <?php include 'head.php';?>
</head>
<body>
  <div>
    <header>
      <h1>Select Map To Play</h1>
    </header>
  </div>

  <div>
    <?php echo '<form action=' . $playType . '.php' . ' method="post">'; ?>
      <button type="submit" name="map_id" value="1"> <img src="Map1.jpg" /> </button>
      <button type="submit" name="map_id" value="2"> <img src="Map2.jpg" /> </button>
      <button type="submit" name="map_id" value="3"> <img src="Map3.jpg" /> </button>
    </form>
  </div>
</body>

</html>
