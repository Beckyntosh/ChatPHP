CREATE TABLE game_saves (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert values into game_saves table
INSERT INTO game_saves (filename, file_path) VALUES ('save1.txt', 'uploads/save1.txt');
INSERT INTO game_saves (filename, file_path) VALUES ('save2.txt', 'uploads/save2.txt');
INSERT INTO game_saves (filename, file_path) VALUES ('save3.txt', 'uploads/save3.txt');
INSERT INTO game_saves (filename, file_path) VALUES ('save4.txt', 'uploads/save4.txt');
INSERT INTO game_saves (filename, file_path) VALUES ('save5.txt', 'uploads/save5.txt');
INSERT INTO game_saves (filename, file_path) VALUES ('save6.txt', 'uploads/save6.txt');
INSERT INTO game_saves (filename, file_path) VALUES ('save7.txt', 'uploads/save7.txt');
INSERT INTO game_saves (filename, file_path) VALUES ('save8.txt', 'uploads/save8.txt');
INSERT INTO game_saves (filename, file_path) VALUES ('save9.txt', 'uploads/save9.txt');
INSERT INTO game_saves (filename, file_path) VALUES ('save10.txt', 'uploads/save10.txt');