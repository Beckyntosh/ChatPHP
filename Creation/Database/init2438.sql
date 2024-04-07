CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(50) NOT NULL,
    preferences TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, password, preferences) VALUES ('john_doe', '$2y$10$TIToMlZKOGypv7k69BdsTugYz1s8my1jDg64FZN4AW2yTj7CY.AcO', 'Guitars,Drums,Pianos');
INSERT INTO users (username, password, preferences) VALUES ('jane_smith', '$2y$10$D89fz9qSa9w5gdO7e1EF8e/XM60725c5fh6xSFRv4NgE/0o3zsVvC', 'Violins,Keyboards,Saxophones');
INSERT INTO users (username, password, preferences) VALUES ('mike_adams', '$2y$10$NZ8DOovq1B01ZJXd/4.rk.K.T30RL4Mn3LH9QuitprlYaEKtk5bSK', 'Bass Guitars,Flutes,Trumpets');
INSERT INTO users (username, password, preferences) VALUES ('sarah_wilson', '$2y$10$fIvefEJqhseTjeKVhyDv.OiW5pju6TUUOy3lTdfJ50vPk9DOhXJ1u', 'Synthesizers,Harmonicas,Ukuleles');
INSERT INTO users (username, password, preferences) VALUES ('alex_jones', '$2y$10$WVgwRR1J9b8o.brAIKIJpO5da3MOGYMhW1BMRnQPDUJ2oqdH.1uEa', 'Xylophones,Trombones,Congas');
INSERT INTO users (username, password, preferences) VALUES ('emily_brown', '$2y$10$Po6o4GpDTEeJo0N978ha0OBJ.hSlC7JdcxT19vkTYIlXT0yeCC.xm', 'Percussion,Cellos,Violas');
INSERT INTO users (username, password, preferences) VALUES ('david_miller', '$2y$10$ntEKf2L0sc63SroV/ftC7.aol.O7mxgJULCD8I1FwfB9F5.cScDLK', 'Bagpipes,Harp,Tubas');
INSERT INTO users (username, password, preferences) VALUES ('laura_white', '$2y$10$DRLlpwsoSv6rPcCTT5WRmuVLx1wzHySbw.ttCp9a49BIc.tarZIC.', 'Didgeridoos,Oboes,Psalteries');
INSERT INTO users (username, password, preferences) VALUES ('kevin_harris', '$2y$10$Q0iMNHvjSDuVeFIaUSGdqOQa/8RwBiN7fkBrSoDBAW4p5sKt3X5Ge', 'Accordions,Banjos,Harpsichords');
INSERT INTO users (username, password, preferences) VALUES ('olivia_clark', '$2y$10$yY194v7eQSV17SuzPettC.oMh22nP8btBbRAl7p2D.t.webX38/ws', 'Piccolos,Mandolins,Bouzoukis');
