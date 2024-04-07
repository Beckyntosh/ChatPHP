CREATE TABLE IF NOT EXISTS game_saves (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO game_saves (filename) VALUES ('save1.ess');
INSERT INTO game_saves (filename) VALUES ('save2.ess');
INSERT INTO game_saves (filename) VALUES ('save3.ess');
INSERT INTO game_saves (filename) VALUES ('save4.ess');
INSERT INTO game_saves (filename) VALUES ('save5.skse');
INSERT INTO game_saves (filename) VALUES ('save6.skse');
INSERT INTO game_saves (filename) VALUES ('save7.skse');
INSERT INTO game_saves (filename) VALUES ('save8.skse');
INSERT INTO game_saves (filename) VALUES ('save9.ess');
INSERT INTO game_saves (filename) VALUES ('save10.ess');