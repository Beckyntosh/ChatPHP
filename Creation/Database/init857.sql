CREATE TABLE IF NOT EXISTS source_code (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS wishlist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS forums (
    id INT AUTO_INCREMENT PRIMARY KEY,
    topic VARCHAR(100) NOT NULL,
    content TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS portfolios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    files TEXT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO source_code (code) VALUES ('Sample source code 1');
INSERT INTO source_code (code) VALUES ('Sample source code 2');
INSERT INTO source_code (code) VALUES ('Sample source code 3');
INSERT INTO users (username, password) VALUES ('user1', 'password1');
INSERT INTO users (username, password) VALUES ('user2', 'password2');
INSERT INTO wishlist (user_id, product_id) VALUES (1, 101);
INSERT INTO wishlist (user_id, product_id) VALUES (1, 102);
INSERT INTO wishlist (user_id, product_id) VALUES (2, 103);
INSERT INTO forums (topic, content) VALUES ('Topic 1', 'Forum content 1');
INSERT INTO forums (topic, content) VALUES ('Topic 2', 'Forum content 2');
INSERT INTO portfolios (user_id, files) VALUES (1, 'File1.pdf');
