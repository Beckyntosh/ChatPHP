CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE channel_subscriptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    ch_id INT NOT NULL
);

CREATE TABLE patents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description TEXT
);

INSERT INTO users (username, password) VALUES ('JohnDoe', 'password1');
INSERT INTO users (username, password) VALUES ('JaneSmith', 'password2');
INSERT INTO users (username, password) VALUES ('AliceJohnson', 'password3');
INSERT INTO users (username, password) VALUES ('BobWilliams', 'password4');
INSERT INTO users (username, password) VALUES ('EveBrown', 'password5');
INSERT INTO channel_subscriptions (user_id, ch_id) VALUES (1, 101);
INSERT INTO channel_subscriptions (user_id, ch_id) VALUES (2, 102);
INSERT INTO channel_subscriptions (user_id, ch_id) VALUES (3, 103);
INSERT INTO channel_subscriptions (user_id, ch_id) VALUES (4, 104);
INSERT INTO channel_subscriptions (user_id, ch_id) VALUES (5, 105);
