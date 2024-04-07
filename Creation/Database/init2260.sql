CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO users (username, email, reg_date) VALUES ("JohnDoe", "johndoe@example.com", NOW());
INSERT INTO users (username, email, reg_date) VALUES ("JaneSmith", "janesmith@example.com", NOW());
INSERT INTO users (username, email, reg_date) VALUES ("AliceBrown", "alicebrown@example.com", NOW());
INSERT INTO users (username, email, reg_date) VALUES ("BobWhite", "bobwhite@example.com", NOW());
INSERT INTO users (username, email, reg_date) VALUES ("EmilyGreen", "emilygreen@example.com", NOW());

CREATE TABLE IF NOT EXISTS preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    preference_type VARCHAR(50),
    preference_value VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (1, "fav_genre", "fiction");
INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (1, "newsletter", "yes");
INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (2, "fav_genre", "non-fiction");
INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (2, "newsletter", "no");
INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (3, "fav_genre", "fantasy");
INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (3, "newsletter", "yes");
INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (4, "fav_genre", "mystery");
INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (4, "newsletter", "yes");
INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (5, "fav_genre", "fiction");
INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (5, "newsletter", "no");