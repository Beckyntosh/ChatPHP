CREATE TABLE IF NOT EXISTS game_saves (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO game_saves (filename) VALUES ('uploads/save1.sav');
INSERT INTO game_saves (filename) VALUES ('uploads/save2.save');
INSERT INTO game_saves (filename) VALUES ('uploads/save3.sav');
INSERT INTO game_saves (filename) VALUES ('uploads/save4.save');
INSERT INTO game_saves (filename) VALUES ('uploads/save5.sav');
INSERT INTO game_saves (filename) VALUES ('uploads/save6.save');
INSERT INTO game_saves (filename) VALUES ('uploads/save7.sav');
INSERT INTO game_saves (filename) VALUES ('uploads/save8.save');
INSERT INTO game_saves (filename) VALUES ('uploads/save9.sav');
INSERT INTO game_saves (filename) VALUES ('uploads/save10.save');
