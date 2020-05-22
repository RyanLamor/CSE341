<?php
  $test = $_POST['btn'];
  echo $test;

  foreach ($_POST['btn'] as $key => $value){
    if (isset($value)){
      header( "Location: $value");
    }
  }
 ?>
