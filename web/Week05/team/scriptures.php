<?php
  session_start();
  require "dbConnect.php";
  $db = get_db();
  $_SESSION['db'] = $db;
 ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php';?>
<script src="getScriptures.js"></script>
<body>
    <h1>Scripture Resources</h1>
    <form onsubmit="return getScriptures()">
        <select id="selectBook">
        <?php
            foreach ($db->query('SELECT DISTINCT book FROM scriptures') as $row)
            {
                echo '<option value="' . $row['book'] . '">' . $row['book'] . '</option>';
            }
        ?>
        </select>
        <input type="submit">
    </form>

</body>
</html>
