<?php
  require "dbConnect.php";
  $db = get_db();

  $book = $_POST['book'];
  $books = "";

foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row)
  {
  	$book = $row['book'];
  	$chapter = $row['chapter'];
  	$verse = $row['verse'];
  	$content = $row['content'];

    $books .= "<p><strong>$book $chapter:$verse</strong> - \"$content\"<p><br>";
  }
 ?>
