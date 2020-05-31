/*get list of all single player games order by score
  update top ten games to isHighScore = true
  update remaining games to isHighScore = false
  
  repeat for multiPlayer games

  update maps with new high scores
  UPDATE maps m1
  SET singlePlayerHighScores =
    array(SELECT gh.game_id FROM singleplayergamehistory gh, maps m2
    WHERE gh.isHighScore = true
    AND gh.map_id = m2.map_id
    AND m1.map_id = m2.map_id
    ORDER BY gh.game_id ASC);

  repeat for mulitplayerHighScores
  */
