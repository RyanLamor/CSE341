<?php
    session_start();
    require 'dbConnect.php';
    $db = get_db();

    try{
      //set all high scores to false
      $db->query('UPDATE singleplayergamehistory SET ishighscore = false');
      $db->query('UPDATE multiplayergamehistory SET ishighscore = false');

      //get list of map id's
      $maps = $db->query('SELECT map_id FROM maps');
      $maps = $maps->fetchAll(PDO::FETCH_ASSOC);

      //for each map, update the top ten high scores for that map to true
      foreach ($maps as $map){
        //singlePlayer games
        $statement = $db->prepare('UPDATE singleplayergamehistory SET ishighscore = true
                                   WHERE game_id IN (SELECT game_id FROM singleplayergamehistory
                                                     ORDER  BY score DESC
                                                     WHERE map_id = :map_id
                                                     LIMIT  10)');
        $statement->bindValue('map_id', $map['map_id']);
        $statement->execute();

        //multiPlayer games
        $statement = $db->prepare('UPDATE multiplayergamehistory SET ishighscore = true
                                   WHERE game_id IN (SELECT game_id FROM multiplayergamehistory
                                                     ORDER  BY score DESC
                                                     WHERE map_id = :map_id
                                                     LIMIT  10)');
        $statement->bindValue('map_id', $map['map_id']);
        $statement->execute();
      }

      //update map high score tables with new high score data
      $db->query('UPDATE maps m1
                  SET singlePlayerHighScores =
                      array(SELECT gh.game_id FROM singleplayergamehistory gh, maps m2
                      WHERE gh.isHighScore = true
                      AND gh.map_id = m2.map_id
                      AND m1.map_id = m2.map_id
                      ORDER BY gh.game_id ASC)');

      $db->query('UPDATE maps m1
                  SET multiplayerhighscores =
                      array(SELECT gh.game_id FROM multiplayergamehistory gh, maps m2
                      WHERE gh.isHighScore = true
                      AND gh.map_id = m2.map_id
                      AND m1.map_id = m2.map_id
                      ORDER BY gh.game_id ASC)');
    }
    catch (Exception $ex){
        echo "Error with DB. Details: $ex";
        die();
      }

 ?>
