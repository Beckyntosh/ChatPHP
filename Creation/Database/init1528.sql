CREATE TABLE IF NOT EXISTS game_saves (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filesize INT(11) NOT NULL,
    uploaded_on DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO game_saves (filename, filesize) VALUES ('SkyrimSave1.sav', 1024);
INSERT INTO game_saves (filename, filesize) VALUES ('ZeldaSave1.save', 512);
INSERT INTO game_saves (filename, filesize) VALUES ('MarioSave1.sav', 768);
INSERT INTO game_saves (filename, filesize) VALUES ('PokemonSave1.save', 2048);
INSERT INTO game_saves (filename, filesize) VALUES ('CallOfDutySave1.sav', 1536);
INSERT INTO game_saves (filename, filesize) VALUES ('FIFA20Save1.save', 8192);
INSERT INTO game_saves (filename, filesize) VALUES ('AssassinsCreedSave1.sav', 4096);
INSERT INTO game_saves (filename, filesize) VALUES ('FortniteSave1.save', 3072);
INSERT INTO game_saves (filename, filesize) VALUES ('GTA5Save1.sav', 6144);
INSERT INTO game_saves (filename, filesize) VALUES ('MinecraftSave1.save', 2560);
