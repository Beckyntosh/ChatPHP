CREATE TABLE IF NOT EXISTS game_saves (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO game_saves (filename, file_path) VALUES ('SkyrimSave1', 'uploads/SkyrimSave1.sav');
INSERT INTO game_saves (filename, file_path) VALUES ('SkyrimSave2', 'uploads/SkyrimSave2.sav');
INSERT INTO game_saves (filename, file_path) VALUES ('SkyrimSave3', 'uploads/SkyrimSave3.sav');
INSERT INTO game_saves (filename, file_path) VALUES ('SkyrimSave4', 'uploads/SkyrimSave4.sav');
INSERT INTO game_saves (filename, file_path) VALUES ('SkyrimSave5', 'uploads/SkyrimSave5.sav');
INSERT INTO game_saves (filename, file_path) VALUES ('SkyrimSave6', 'uploads/SkyrimSave6.sav');
INSERT INTO game_saves (filename, file_path) VALUES ('SkyrimSave7', 'uploads/SkyrimSave7.sav');
INSERT INTO game_saves (filename, file_path) VALUES ('SkyrimSave8', 'uploads/SkyrimSave8.sav');
INSERT INTO game_saves (filename, file_path) VALUES ('SkyrimSave9', 'uploads/SkyrimSave9.sav');
INSERT INTO game_saves (filename, file_path) VALUES ('SkyrimSave10', 'uploads/SkyrimSave10.sav');