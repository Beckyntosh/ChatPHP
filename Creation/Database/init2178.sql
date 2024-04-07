CREATE TABLE IF NOT EXISTS user_language_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid VARCHAR(30) NOT NULL,
    preferred_language VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO user_language_preferences (userid, preferred_language) VALUES ('user1', 'Spanish');
INSERT INTO user_language_preferences (userid, preferred_language) VALUES ('user2', 'English');
INSERT INTO user_language_preferences (userid, preferred_language) VALUES ('user3', 'French');
INSERT INTO user_language_preferences (userid, preferred_language) VALUES ('user4', 'German');
INSERT INTO user_language_preferences (userid, preferred_language) VALUES ('user5', 'Spanish');
INSERT INTO user_language_preferences (userid, preferred_language) VALUES ('user6', 'French');
INSERT INTO user_language_preferences (userid, preferred_language) VALUES ('user7', 'English');
INSERT INTO user_language_preferences (userid, preferred_language) VALUES ('user8', 'German');
INSERT INTO user_language_preferences (userid, preferred_language) VALUES ('user9', 'Spanish');
INSERT INTO user_language_preferences (userid, preferred_language) VALUES ('user10', 'English');
