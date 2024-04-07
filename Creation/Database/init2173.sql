CREATE TABLE IF NOT EXISTS user_preferences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    language VARCHAR(10) NOT NULL
) ENGINE=InnoDB;

INSERT INTO user_preferences (language) VALUES ('English');
INSERT INTO user_preferences (language) VALUES ('Spanish');
INSERT INTO user_preferences (language) VALUES ('French');
INSERT INTO user_preferences (language) VALUES ('German');
INSERT INTO user_preferences (language) VALUES ('Italian');
INSERT INTO user_preferences (language) VALUES ('Mandarin');
INSERT INTO user_preferences (language) VALUES ('Japanese');
INSERT INTO user_preferences (language) VALUES ('Russian');
INSERT INTO user_preferences (language) VALUES ('Arabic');
INSERT INTO user_preferences (language) VALUES ('Hindi');
