CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) NOT NULL,
    follower_id INT(6) NOT NULL
);

INSERT INTO users (user_id, follower_id) VALUES (1, 2);
INSERT INTO users (user_id, follower_id) VALUES (2, 3);
INSERT INTO users (user_id, follower_id) VALUES (3, 4);
INSERT INTO users (user_id, follower_id) VALUES (4, 5);
INSERT INTO users (user_id, follower_id) VALUES (5, 6);
INSERT INTO users (user_id, follower_id) VALUES (6, 7);
INSERT INTO users (user_id, follower_id) VALUES (7, 8);
INSERT INTO users (user_id, follower_id) VALUES (8, 9);
INSERT INTO users (user_id, follower_id) VALUES (9, 10);
INSERT INTO users (user_id, follower_id) VALUES (10, 1);