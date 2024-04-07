CREATE TABLE IF NOT EXISTS forum_users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nickname VARCHAR(30) NOT NULL UNIQUE,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    affiliation ENUM('survivor', 'wanderer', 'herbalist') DEFAULT 'survivor',
    join_date TIMESTAMP
);

INSERT INTO forum_users (nickname, email, password, affiliation) VALUES ('Gunner', 'gunner@example.com', 'gun123', 'wanderer');
INSERT INTO forum_users (nickname, email, password, affiliation) VALUES ('Survivor123', 'survivor123@example.com', 'surv456', 'survivor');
INSERT INTO forum_users (nickname, email, password, affiliation) VALUES ('Ranger', 'ranger@example.com', 'rang789', 'wanderer');
INSERT INTO forum_users (nickname, email, password, affiliation) VALUES ('HerbMaster', 'herbmaster@example.com', 'herb123', 'herbalist');
INSERT INTO forum_users (nickname, email, password, affiliation) VALUES ('WandererX', 'wandererx@example.com', 'wand567', 'wanderer');
INSERT INTO forum_users (nickname, email, password, affiliation) VALUES ('TechSurvivor', 'techsurvivor@example.com', 'tech123', 'survivor');
INSERT INTO forum_users (nickname, email, password, affiliation) VALUES ('HerbDoc', 'herbdoc@example.com', 'doc456', 'herbalist');
INSERT INTO forum_users (nickname, email, password, affiliation) VALUES ('WildExplorer', 'wildexplorer@example.com', 'wild789', 'wanderer');
INSERT INTO forum_users (nickname, email, password, affiliation) VALUES ('TechWhiz', 'techwhiz@example.com', 'whiz123', 'survivor');
INSERT INTO forum_users (nickname, email, password, affiliation) VALUES ('HerbGuru', 'herbguru@example.com', 'guru456', 'herbalist');