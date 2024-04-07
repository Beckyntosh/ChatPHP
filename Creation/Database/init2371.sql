CREATE TABLE IF NOT EXISTS forum_members (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO forum_members (username, email, password) VALUES ('john_doe', 'john.doe@example.com', 'password123');
INSERT INTO forum_members (username, email, password) VALUES ('jane_smith', 'jane.smith@example.com', 'pass123word');
INSERT INTO forum_members (username, email, password) VALUES ('tech_guru', 'tech@guru.com', 'forumTech123');
INSERT INTO forum_members (username, email, password) VALUES ('coding_ninja', 'codingninja@gmail.com', 'ninjaCode456');
INSERT INTO forum_members (username, email, password) VALUES ('math_master', 'mathmaster@math.com', 'math1234');
INSERT INTO forum_members (username, email, password) VALUES ('science_buff', 'science.buff@gmail.com', 'sciencelove789');
INSERT INTO forum_members (username, email, password) VALUES ('bookworm', 'bookworm123@yahoo.com', 'readingiscool');
INSERT INTO forum_members (username, email, password) VALUES ('art_lover', 'artlover@gmail.com', 'painting123');
INSERT INTO forum_members (username, email, password) VALUES ('coding_wiz', 'wizcoder@coding.com', 'wizkid456');
INSERT INTO forum_members (username, email, password) VALUES ('gamer_girl', 'gamer.girl@yahoo.com', 'gamerlife789');
