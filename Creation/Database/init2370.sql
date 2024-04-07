CREATE TABLE IF NOT EXISTS forum_users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO forum_users (username, email, password) VALUES ('john_doe', 'johndoe@example.com', 'password123');
INSERT INTO forum_users (username, email, password) VALUES ('jane_smith', 'janesmith@example.com', 'letmein');
INSERT INTO forum_users (username, email, password) VALUES ('mark_robinson', 'markrobinson@example.com', 'secretword');
INSERT INTO forum_users (username, email, password) VALUES ('sarah_jones', 'sarahjones@example.com', 'hello123');
INSERT INTO forum_users (username, email, password) VALUES ('michael_white', 'michaelwhite@example.com', 'p@ssw0rd');
INSERT INTO forum_users (username, email, password) VALUES ('lisa_brown', 'lisabrown@example.com', 'qwerty');
INSERT INTO forum_users (username, email, password) VALUES ('kevin_miller', 'kevinmiller@example.com', 'password1234');
INSERT INTO forum_users (username, email, password) VALUES ('emily_taylor', 'emilytaylor@example.com', 'ilovecoding');
INSERT INTO forum_users (username, email, password) VALUES ('ryan_hall', 'ryanhall@example.com', 'securepassword');
INSERT INTO forum_users (username, email, password) VALUES ('amy_cook', 'amycook@example.com', 'letmein2022');
