CREATE TABLE IF NOT EXISTS game_saves (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    save_data LONGBLOB NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO game_saves (file_name, save_data) VALUES ('save1', '01010101010101010101');
INSERT INTO game_saves (file_name, save_data) VALUES ('save2', '02020202020202020202');
INSERT INTO game_saves (file_name, save_data) VALUES ('save3', '03030303030303030303');
INSERT INTO game_saves (file_name, save_data) VALUES ('save4', '04040404040404040404');
INSERT INTO game_saves (file_name, save_data) VALUES ('save5', '05050505050505050505');
INSERT INTO game_saves (file_name, save_data) VALUES ('save6', '06060606060606060606');
INSERT INTO game_saves (file_name, save_data) VALUES ('save7', '07070707070707070707');
INSERT INTO game_saves (file_name, save_data) VALUES ('save8', '08080808080808080808');
INSERT INTO game_saves (file_name, save_data) VALUES ('save9', '09090909090909090909');
INSERT INTO game_saves (file_name, save_data) VALUES ('save10', '10101010101010101010');