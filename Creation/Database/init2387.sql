CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS browsing_history (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_id INT(6) UNSIGNED,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS recommendations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_id INT(6) UNSIGNED,
    reason VARCHAR(255),
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (email, password) VALUES ('john@example.com', 'password1');
INSERT INTO users (email, password) VALUES ('jane@example.com', 'password2');
INSERT INTO users (email, password) VALUES ('smith@example.com', 'password3');
INSERT INTO users (email, password) VALUES ('alice@example.com', 'password4');
INSERT INTO users (email, password) VALUES ('bob@example.com', 'password5');
INSERT INTO users (email, password) VALUES ('sara@example.com', 'password6');
INSERT INTO users (email, password) VALUES ('matt@example.com', 'password7');
INSERT INTO users (email, password) VALUES ('emily@example.com', 'password8');
INSERT INTO users (email, password) VALUES ('david@example.com', 'password9');
INSERT INTO users (email, password) VALUES ('olivia@example.com', 'password10');

INSERT INTO browsing_history (user_id, product_id) VALUES (1, 1);
INSERT INTO browsing_history (user_id, product_id) VALUES (1, 2);
INSERT INTO browsing_history (user_id, product_id) VALUES (1, 3);
INSERT INTO browsing_history (user_id, product_id) VALUES (2, 1);
INSERT INTO browsing_history (user_id, product_id) VALUES (2, 3);
INSERT INTO browsing_history (user_id, product_id) VALUES (3, 2);
INSERT INTO browsing_history (user_id, product_id) VALUES (4, 1);
INSERT INTO browsing_history (user_id, product_id) VALUES (4, 4);
INSERT INTO browsing_history (user_id, product_id) VALUES (5, 2);
INSERT INTO browsing_history (user_id, product_id) VALUES (5, 3);
