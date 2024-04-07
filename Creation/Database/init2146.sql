CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE IF NOT EXISTS user_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid INT(6) UNSIGNED NOT NULL,
    homepage_layout VARCHAR(50) NOT NULL,
    theme VARCHAR(50) NOT NULL,
    UNIQUE KEY unique_user (userid),
    FOREIGN KEY (userid) REFERENCES users(id) ON DELETE CASCADE
);

INSERT INTO users VALUES (1);
INSERT INTO users VALUES (2);
INSERT INTO users VALUES (3);
INSERT INTO users VALUES (4);
INSERT INTO users VALUES (5);
INSERT INTO users VALUES (6);
INSERT INTO users VALUES (7);
INSERT INTO users VALUES (8);
INSERT INTO users VALUES (9);
INSERT INTO users VALUES (10);

INSERT INTO user_preferences (userid, homepage_layout, theme) VALUES (1, 'classic', 'light');
INSERT INTO user_preferences (userid, homepage_layout, theme) VALUES (2, 'modern', 'dark');
INSERT INTO user_preferences (userid, homepage_layout, theme) VALUES (3, 'classic', 'dark');
INSERT INTO user_preferences (userid, homepage_layout, theme) VALUES (4, 'modern', 'light');
INSERT INTO user_preferences (userid, homepage_layout, theme) VALUES (5, 'classic', 'light');
INSERT INTO user_preferences (userid, homepage_layout, theme) VALUES (6, 'modern', 'dark');
INSERT INTO user_preferences (userid, homepage_layout, theme) VALUES (7, 'classic', 'dark');
INSERT INTO user_preferences (userid, homepage_layout, theme) VALUES (8, 'modern', 'light');
INSERT INTO user_preferences (userid, homepage_layout, theme) VALUES (9, 'classic', 'light');
INSERT INTO user_preferences (userid, homepage_layout, theme) VALUES (10, 'modern', 'dark');
