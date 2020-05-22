
<?php

    try
    {
        $dbUrl = getenv('DATABASE_URL');

        $dbOpts = parse_url($dbUrl);

        $dbHost = $dbOpts["host"];
        $dbPort = $dbOpts["port"];
        $dbUser = $dbOpts["user"];
        $dbPassword = $dbOpts["pass"];
        $dbName = ltrim($dbOpts["path"],'/');

        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $ex)
    {
        echo 'Error!: ' . $ex->getMessage();
        die();
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php';?>
<body>
    <h1>Scripture Resources</h1>
    <form action="">
        <select>
        <?php
            foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row)
            {
              $book = $row['book'];
              $chapter = $row['chapter'];
              $verse = $row['verse'];
              $content = $row['content'];

              echo "<p><strong>$book $chapter:$verse</strong> - \"$content\"<p>";
            }
        ?>
        </select>
        <input type="submit">
    </form>

</body>
</html>
