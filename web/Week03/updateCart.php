<?php
  $item = array('name' => $_POST['name'], 'cost' => $_POST['cost']);
  $_SESSION['itemsInCart'][] = $item;
  var_dump($_SESSION['itemsInCart']);
 ?>
