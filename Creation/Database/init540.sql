CREATE TABLE IF NOT EXISTS game_saves (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO game_saves (filename) VALUES ('save1.sav');
INSERT INTO game_saves (filename) VALUES ('save2.sav');
INSERT INTO game_saves (filename) VALUES ('save3.sav');
INSERT INTO game_saves (filename) VALUES ('save4.sav');
INSERT INTO game_saves (filename) VALUES ('save5.sav');
INSERT INTO game_saves (filename) VALUES ('save6.sav');
INSERT INTO game_saves (filename) VALUES ('save7.sav');
INSERT INTO game_saves (filename) VALUES ('save8.sav');
INSERT INTO game_saves (filename) VALUES ('save9.sav');
INSERT INTO game_saves (filename) VALUES ('save10.sav');
