<?php
  session_start();
  if (empty($_SESSION['itemsInCart']))
  {
    echo false;
  }
  else {
    echo true;
  }
 ?>
