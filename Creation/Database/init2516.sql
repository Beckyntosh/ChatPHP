CREATE TABLE IF NOT EXISTS user_preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
preferred_language VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO user_preferences (username, preferred_language) VALUES ('john_doe', 'English');
INSERT INTO user_preferences (username, preferred_language) VALUES ('jane_smith', 'Spanish');
INSERT INTO user_preferences (username, preferred_language) VALUES ('michael_green', 'French');
INSERT INTO user_preferences (username, preferred_language) VALUES ('sara_miller', 'German');
INSERT INTO user_preferences (username, preferred_language) VALUES ('peter_davis', 'English');
INSERT INTO user_preferences (username, preferred_language) VALUES ('lisa_brown', 'Spanish');
INSERT INTO user_preferences (username, preferred_language) VALUES ('steve_white', 'French');
INSERT INTO user_preferences (username, preferred_language) VALUES ('emily_hall', 'German');
INSERT INTO user_preferences (username, preferred_language) VALUES ('adam_young', 'English');
INSERT INTO user_preferences (username, preferred_language) VALUES ('olivia_king', 'Spanish');
