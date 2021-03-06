<?php
  require "dbConnect.php";
  $db = get_db();

  $book = $_POST['book'];
  $books = "";

  $stmt = $db->prepare('SELECT book, chapter, verse, content FROM scriptures WHERE book=:book');
  $stmt->bindValue(':book', $book, PDO::PARAM_INT);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($rows as $row)
    {
    	$book = $row['book'];
    	$chapter = $row['chapter'];
    	$verse = $row['verse'];
    	$content = $row['content'];

      $books .= "<strong>$book $chapter:$verse</strong> - \"$content\"<br>";
    }
  echo $books;
 ?>
