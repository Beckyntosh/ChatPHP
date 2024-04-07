CREATE TABLE IF NOT EXISTS forum_users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP
);

INSERT INTO forum_users (username, email, password) VALUES ('john_doe', 'john.doe@example.com', 'password123');
INSERT INTO forum_users (username, email, password) VALUES ('jane_smith', 'jane.smith@example.com', 'securepass');
INSERT INTO forum_users (username, email, password) VALUES ('tech_guru', 'tech.guru@example.com', 'tech123');
INSERT INTO forum_users (username, email, password) VALUES ('coding_ninja', 'coding.ninja@example.com', 'codingiscool');
INSERT INTO forum_users (username, email, password) VALUES ('design_master', 'design.master@example.com', 'designer123');
INSERT INTO forum_users (username, email, password) VALUES ('programming_pro', 'programming.pro@example.com', 'letscodetoday');
INSERT INTO forum_users (username, email, password) VALUES ('web_dev', 'web.dev@example.com', 'webmaster');
INSERT INTO forum_users (username, email, password) VALUES ('forum_user1', 'forum.user1@example.com', 'forumpass1');
INSERT INTO forum_users (username, email, password) VALUES ('forum_user2', 'forum.user2@example.com', 'forumpass2');
INSERT INTO forum_users (username, email, password) VALUES ('forum_user3', 'forum.user3@example.com', 'forumpass3');
