CREATE TABLE IF NOT EXISTS user_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    preferred_language VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO user_preferences (username, preferred_language) VALUES ('john_doe', 'English');
INSERT INTO user_preferences (username, preferred_language) VALUES ('jane_smith', 'French');
INSERT INTO user_preferences (username, preferred_language) VALUES ('mike_jones', 'German');
INSERT INTO user_preferences (username, preferred_language) VALUES ('sara_adams', 'Spanish');
INSERT INTO user_preferences (username, preferred_language) VALUES ('tom_wilson', 'Italian');
INSERT INTO user_preferences (username, preferred_language) VALUES ('emily_brown', 'English');
INSERT INTO user_preferences (username, preferred_language) VALUES ('alex_carter', 'Spanish');
INSERT INTO user_preferences (username, preferred_language) VALUES ('laura_hall', 'French');
INSERT INTO user_preferences (username, preferred_language) VALUES ('chris_roberts', 'German');
INSERT INTO user_preferences (username, preferred_language) VALUES ('julia_white', 'Italian');
