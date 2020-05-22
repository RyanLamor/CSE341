<?php
  require "dbConnect.php";
  $db = get_db();

  $book = $_POST['book'];
  $books = "";

  $statement = $db->prepare("SELECT book, chapter, verse, content FROM scripture");
  $statement->execute();

  echo "test";
  // Go through each result
//  while ($row = $statement->fetch(PDO::FETCH_ASSOC))
  //{
  	// The variable "row" now holds the complete record for that
  	// row, and we can access the different values based on their
  	// name
  	//$book = $row['book'];
  	//$chapter = $row['chapter'];
  ///	$verse = $row['verse'];
  ///	$content = $row['content'];

    //$books .= "<p><strong>$book $chapter:$verse</strong> - \"$content\"<p><br>";
//  }
 ?>
