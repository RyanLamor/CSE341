--USERS--
CREATE TABLE users(
 user_id SERIAL NOT NULL primary key,
 username varchar(80) NOT NULL unique,
 password varchar(80) NOT NULL,
 screen_name varchar(80) NOT NULL unique,
 friendList int []);

INSERT INTO users (username,password,screen_name) VALUES 
('Ryanlx',
 'Ryan123',
 'Rannix'),
('Ashlyn',
 'Ash1118',
 'Ash'),
('Daniel',
 'Dan123',
 'Dannyboy');

UPDATE users 
SET friendList = array_append(friendList, 2)
WHERE user_id = 1;

UPDATE users 
SET friendList = array_append(friendList, 3)
WHERE user_id = 1;

UPDATE users 
SET friendList = array_append(friendList, 1)
WHERE user_id = 2;

UPDATE users 
SET friendList = array_appen(friendList, 1)
WHERE user_id = 3;

--MAPS--
create table maps (
 map_id SERIAL NOT NULL PRIMARY KEY,
 name varchar(80) NOT NULL),
 singlePlayerHighScores INT [],
 multiPlayerHighScores INT[];

INSERT INTO maps (name) values
('windowDay'),
('windowNight'),
('cupCondensation');

UPDATE maps m1
SET singlePlayerHighScores = 
  array(SELECT gh.game_id FROM singleplayergamehistory gh, maps m2
  WHERE gh.isHighScore = true
  AND gh.map_id = m2.map_id
  AND m1.map_id = m2.map_id
  ORDER BY gh.game_id ASC);

--SINGLE PLAYER GAMES PLAYED--
CREATE TABLE singlePlayerGameHistory --only keep 10 most recent played games
 (
 game_id SERIAL PRIMARY KEY,
 map_id INT NOT NULL references maps(map_id),
 player INT NOT NULL references users(user_id),
 score INT NOT NULL,
 time TIME NOT NULL,
 isHighScore BOOLEAN NOT NULL, --if true, dont delete
 dateCreated DATE NOT NULL);

INSERT INTO singleplayergamehistory (map_id, player, score, time, isHighScore, dateCreated)
VALUES(
 1,
 3,
 15000,
 '00:04:30',
 true,
 current_date),
(
 1,
 2,
 25000,
 '00:03:30',
 true,
 current_date),
(
 1,
 1,
 1000,
 '00:10:00',
 false,
 current_date),
(
 1,
 3,
 10000,
 '00:05:45',
 true,
 current_date),
(
 2,
 2,
 5000,
 '00:07:00',
 false,
 current_date),
(
 3,
 1,
 30000,
 '00:2:00',
 true,
 current_date);

--MULTIPLAYER GAMES PLAYED--
CREATE TABLE multiPlayerGameHistory --only keep 10 most recent played games
 (
 game_id SERIAL PRIMARY KEY,
 map_id INT NOT NULL references maps(map_id),
 player1 INT NOT NULL references users(user_id),
 player2 INT NOT NULL references users(user_id),
 score INT NOT NULL,
 time TIME NOT NULL,
 isHighScore BOOLEAN NOT NULL, --if true, dont delete
 dateCreated DATE NOT NULL);