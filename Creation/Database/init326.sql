CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    profile_visibility ENUM('public', 'private') DEFAULT 'public',
    reg_date TIMESTAMP
);

INSERT INTO users (username, profile_visibility, reg_date) VALUES ('JohnDoe', 'public', NOW());
INSERT INTO users (username, profile_visibility, reg_date) VALUES ('JaneSmith', 'private', NOW());
INSERT INTO users (username, profile_visibility, reg_date) VALUES ('AliceJones', 'public', NOW());
INSERT INTO users (username, profile_visibility, reg_date) VALUES ('BobBrown', 'private', NOW());
INSERT INTO users (username, profile_visibility, reg_date) VALUES ('EvaGreen', 'public', NOW());
INSERT INTO users (username, profile_visibility, reg_date) VALUES ('SamWhite', 'private', NOW());
INSERT INTO users (username, profile_visibility, reg_date) VALUES ('LilyBlack', 'public', NOW());
INSERT INTO users (username, profile_visibility, reg_date) VALUES ('TomGrey', 'private', NOW());
INSERT INTO users (username, profile_visibility, reg_date) VALUES ('SophieRed', 'public', NOW());
INSERT INTO users (username, profile_visibility, reg_date) VALUES ('MaxYellow', 'private', NOW());